## Episode Installation

1. Laravel yang digunakan adalah Laravel 11.0.0.
2. Filament yang digunakan 3.0

## Episode Simple Resource

1.  php artisan make:filament-resource "Nama Resource" --simple = untuk membuat resource dengan modal
2. jika tanpa --simple maka resource tersebut akan seperti biasa tanpa modal
3. ->sidebarCollapsibleOnDekstop(true) akan membuat sidebar bisa dikecilkan dan dibesarkan
4. untuk perubahan di dashboard, bisa diganti di file "AdminPanelProvide". untuk nama file tersebut mengikuti pembuatan panel diawal
5. untuk pembuatan method ->afterStateUpdated() didalam file App/Filament/Resource/CategoryNialiResource, terdapat function yang ada \Str-nya, biarkan error tersebut

## Episode Resource

1. Pembuatan CRUD untuk master data
2. membuat kolom yang dimana bisa menupload foto profil
3. mengganti APP_URL di file .env dengan URL yang sudah dihosting seperti http://127.0.0.1:8000
4. directory() = untuk mengatur direktori upload, defaultnya berada di folder public
5. mengatur columnspan agar bisa responsive mengunakan columnspan

## Episode Translation

1. Tutorial membuat nomor urut, atau nomor index di Column. bisa dicari di Documentation "Filament Displaying the row index"
2. Tutorial membuat Translation terhadap Website, dengan membuka documentation Filament "Publishing Translation", dan masukkan command ke CMD "php artisan vendor:publish --tag=filament-panels-translations". Setelah itu file translationnya berada di "vendor/filamentfilament/resource/lang", di dalam file tersebut banyak bahasa yang bisa dipilih.

## Episode Relation Manager

1. Tutorial membuat tabel relasi didalam form , dengan menggunakan "Relation Manager", bisa digunakan untuk membuat tabel dari tabel detail / tabel transaksi.
2. Untuk pembuatan Relasi Manager bisa menggunakan command, "php artisan make:filament-relation-manager 'Resource yang dipilih' 'nama method relasi' name", dengan command tersebut akan membuatkan file relasi manager didalam Resource yang dipilih
3.  File Relasi tersebut bisa dimasukkan Form Builder dan Table Builder.

## Episode Create Option

1. Tutorial membuat shortcut untuk membuat data baru didalam Relation Manager dengan tombol create option form. bisa dicari di filament documentation, search "Creating a new option in a modal".
2. jangan lupa menambhkan method relationship() untuk  menyambungkan modal tersebut dengan database. paramternya adalah "->relationship(name: "nama method dalam model", titleAttribute: "nama fieldnya yang dipilih")"
3. Bisa menambahkan ->createoptionAction() untuk me-custom option form yang kita buat.

## Epiode Import Excel

1. Tutorial mengimport datta dari excel ke database. pertama me install package, yaitu dengan command "composer require maatwebsite/excel"
2. jangan lupa untuk memsettings di file app.php, menambhkan 'Excel' => Maatwebsite/Excel/Facades/Excel::class
3. membuat folder untuk import data, dengan mengetikkan command, "php artisan make:import  "Nama Folder" --model="Nama Model yang dipakai"

## Episode Custom Page

1. Membuat custom Page dengan mengetik command "php artisan make:filament-page "Nama Page" --model="Nama Model yang dipakai" --type=custom