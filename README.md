## How to create custom Artisan Commands

This documentation will show you how to create custom Artisan commands and some pretty cool features you can add.

•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Usage <br>
Clone the repository <br>
```
Composer install <br>
cp .env.example .env <br>
php artisan key:generate <br>
php artisan cache:clear && php artisan config:clear <br>
php artisan serve <br>
```

## Database <br>

Make sure that you have setup your database credentials since we’re going to pull in data from the database <br>
```
mysql; <br>
create database [DATABASE NAME] <br>
exit <br>
```

Create a database migration with a migration by adding the -m flag.
```
php artisan make:model Product -m; <br>
```

Open the products migration inside the ~/database/migrations folder and replace the up() method with
```
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string( 'title' );
        $table->double( 'original_price' );
        $table->tinyInteger( 'in_stock' )->default( 1 );
        $table->tinyInteger( 'status' )->default( 0 );
        $table->timestamps();
    });
}
```
![image](https://user-images.githubusercontent.com/63154066/127561540-3e079bbe-be2a-4f29-93de-b155031df1f2.png)
