cara install app

    1. clone repository 
    
    2. jalankan ' composer install '
    
    3. buat file ' .env ' 
    
    4. masukan semua isi file ' .env.example '  ke file ' .env '
    
    5. setting env terutama ' DB_CONNECTION -  DB_HOST - DB_PORT - DB_DATABASE - DB_USERNAME - DB_PASSWORD
        sesuai mysql  anda
        
    6. jalankan ' php artisan migrate ' ->  unutk setup data base
    
    7. jalankan ' php artisan db:seed --class=ReferenceSeeder ' -> untuk memasukkan data referense ke db
    
    8. jalankan ' php artisan serve ' menjalankan app
    
    9. enjoy 

testing machine:
    MacOs 12.6
    aravel 9.19
    php 8.1.11
    image-docker mysql:5.7


https://app.swaggerhub.com/apis/afitra/kledoApi/1.0.0
