<?php

namespace App\Rules;

use App\Models\UserStatus;
use Illuminate\Contracts\Validation\InvokableRule;
use App\Common\Helpers;

class UserStatusCombination implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  array  $userStatusIds
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $userStatusIds, $fail): void
    {
        try {
            //$userStatusIds = json_encode(array_values($userStatusIds));
            //$userStatus = UserStatus::whereIn('id',$userStatusIds)->select('type')->get();
            $userStatus = array_values((UserStatus::findMany($userStatusIds))->pluck('type')->all());
            $test = ['étudiant','membre ca','membre bde','directeur miage','ancien diplômé', 'enseignant'];

            if(in_array('admin',$userStatus)) {
                $fail('validation.custom.user-status.not-admin')->translate([], 'fr');
                return;
            }

            else if (in_array('membre ca',$userStatus)) {
                if($other = Helpers::in_array_any_return_array(['étudiant', 'membre bde', 'directeur miage', 'enseignant'], $userStatus)) {
                    $fail('validation.custom.user-status.banned-combination')->translate([
                        'attribute' => 'membre ca',
                        'other' => implode(", ", $other)
                    ], 'fr');
                }
                return;
            }

            else if (in_array('membre bde',$userStatus)) {
                if ($other = Helpers::in_array_any_return_array(['membre ca', 'directeur miage','directeur miage'], $userStatus)
                    || ( empty(Helpers::in_array_any_return_array(['étudiant'], $userStatus))
                        && empty(Helpers::in_array_any_return_array(['enseignant'], $userStatus)) ) ) {
                    if(empty(Helpers::in_array_any_return_array(['étudiant'], $userStatus))
                        && empty(Helpers::in_array_any_return_array(['enseignant'], $userStatus))){
                        $fail('validation.custom.user-status.required-combination')->translate([
                            'attribute' => 'étudiant ou enseignant',
                            'other' => 'membre bde'
                        ], 'fr');
                    }else{
                        $fail('validation.custom.user-status.banned-combination')->translate([
                            'attribute' => 'membre bde',
                            'other' => implode(", ", $other)
                        ], 'fr');
                    }
                }
                return;
            }

            else if (in_array('étudiant',$userStatus)) {
                if ($other = Helpers::in_array_any_return_array(['enseignant', 'membre ca', 'directeur miage'], $userStatus)) {
                    $fail('validation.custom.user-status.banned-combination')->translate([
                        'attribute' => 'étudiant',
                        'other' => implode(", ", $other)
                    ], 'fr');
                }
                return;
            }

            else if (in_array('enseignant',$userStatus)) {
                if ($other = Helpers::in_array_any_return_array(['directeur miage', 'membre ca', 'étudiant'], $userStatus)) {
                    $fail('validation.custom.user-status.banned-combination')->translate([
                        'attribute' => 'enseignant',
                        'other' => implode(", ", $other)
                    ], 'fr');
                }
                return;
            }

            else if (in_array('membre ca',$userStatus)) {
                if ($other = Helpers::in_array_any_return_array(['membre bde','étudiant'], $userStatus)) {
                    $fail('validation.custom.user-status.banned-combination')->translate([
                        'attribute' => 'membre ca',
                        'other' => implode(", ", $other)
                    ], 'fr');
                }
                return;
            }
        }
        catch (\Exception $e){
            dd($e);
        }
    }
}
