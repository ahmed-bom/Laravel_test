<!-- component -->
  <script src="https://cdn.tailwindcss.com"></script>
  
<div class="content-center grid justify-items-center w-full h-1/2" >
    <div class="w-[400px]  relative border-dashed border-2 border-sky-500 rounded-lg p-6 " id="dropzone">
    <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" />
    <div class="text-center">
        <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

        <h3 class="mt-2 text-sm font-medium text-gray-900">
            <label for="file-upload" class="relative cursor-pointer">
                <span>Drag and drop</span>
                <input id="file-upload" name="file-upload" type="file" class="sr-only">
            </label>
        </h3>
        <p class="mt-1 text-xs text-gray-500">
            PNG, JPG, GIF up to 10MB
        </p>
        </div>
    </div>
</div>
</div>
<script>
    var dropzone = document.getElementById('dropzone');

    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
        dropzone.classList.add('border-indigo-600');
    });

    dropzone.addEventListener('dragleave', e => {
        e.preventDefault();
        dropzone.classList.remove('border-indigo-600');
    });

    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('border-indigo-600');
        var file = e.dataTransfer.files[0];
        displayPreview(file);
    });

    var input = document.getElementById('file-upload');

    input.addEventListener('change', e => {
        var file = e.target.files[0];
        displayPreview(file);
    });

    function displayPreview(file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.classList.remove('hidden');
        };
    }
</script>
