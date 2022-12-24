<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class DefinitionUsersUsersStatus extends Controller
{
    public function storeDefinitionUsersUsersStatus(Request $request){

        $request->validate([
            'id' => ['string', 'max:255'],
        ]);

        switch ($request->id){
            //étudiant
            case "Etudiant" or "MembreBDE" :




        }
    }
}
