cara install app

    1. clone repository  lalu masuk ke folder hasil clone
    
    2. jalankan ' composer install '
    
    3. buat file ' .env ' 
    
    4. masukan semua isi file ' .env.example '  ke file ' .env '
    
    5. setting variable di file .env  

            DB_CONNECTION -  
            DB_HOST=
            DB_PORT= 
            DB_DATABASE= 
            DB_USERNAME=
            DB_PASSWORD=
        
        
    6. untuk menjalankan   setup/migrasi  database ketik perintah di terminal

        ' php artisan migrate '  
    
    7. untuk memasukkan data referense ke db jalankan  ketik perintah di terminal

        ' php artisan db:seed --class=ReferenceSeeder ' 
    
    8. untuk menjalankan app   ketik perintah di terminal
        ' php artisan serve ' 
    
    9. enjoy 


documentation:

    swaggerUI kurang di dukung  oleh  laravel 9 
    

testing machine:

    MacOs 12.6
    
    laravel 9.19
    
    php 8.1.11
    
    image-docker mysql:5.7


https://app.swaggerhub.com/apis/afitra/kledoApi/1.0.0
