<div>
    <x-filament::breadcrumbs :breadcrumbs="[
        '/admin/teachers' => 'Teachers',
        '' => 'List',
    ]" />
    <div class="flex justify-between mt-1">
        <div class="font-bold text-3xl">
            Teacher
        </div>
        <div>
            {{ $data }} <!-- Bisa menggunakan ini untuk menampilkan data yang telah diupload -->
        </div>
    </div>
        <div>
            <form wire:submit="save" class="w-full max-w-sm flex mt-2"> <!-- jangan lupa untuk menambahkan function save di ListStudent" -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fileInput">
                        Pilih Berkas
                    </label>
                    <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="fileInput" wire:model='file'>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Unggah
                    </button>
                </div>
            </form>
        </div>
</div>