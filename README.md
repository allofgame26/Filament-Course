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
5. mengatur columnspan agar bisa responsive