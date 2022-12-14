<div class="flex items-center justify-center w-full">
    <label for="dropzone-file-{{$name}}" class="flex flex-col items-center justify-center w-full h-38 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div id="dropzone-{{$name}}" class="flex flex-col items-center justify-center pt-5 pb-6">
            <div class="flex flex-col items-center justify-center" id="dropzone-wrapper-{{$name}}">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG, SVG or GIF (MAX. 2MB)</p>
            </div>
        <img class="hidden border-dashed mt-2 rounded-md" id="dropzone-img-{{$name}}" width="40" height="40" />
        </div>
        <input id="dropzone-file-{{$name}}" type="file" name="{{$name}}" class="hidden"/>
    </label>
</div>
<script>
    const img_inp_{{$name}} = document.getElementById('dropzone-file-{{$name}}')
    const img_out_{{$name}} = document.getElementById('dropzone-img-{{$name}}')
    const img_dropzone_wrapper_{{$name}} = document.getElementById('dropzone-wrapper-{{$name}}')
    img_inp_{{$name}}.onchange = event => {
        const [file] = img_inp_{{$name}}.files;
        if (file) {
            img_out_{{$name}}.src = URL.createObjectURL(file);
            img_dropzone_wrapper_{{$name}}.classList.remove('hidden')
            img_dropzone_wrapper_{{$name}}.classList.add('hidden')
            img_out_{{$name}}.classList.add('hidden');
            img_out_{{$name}}.classList.remove('hidden');
        }
    }
</script>