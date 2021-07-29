## How to create custom Artisan Commands

This documentation will show you how to create custom Artisan commands and some pretty cool features you can add.

•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Usage <br>
Clone the repository <br>
```
Composer install
cp .env.example .env 
php artisan key:generate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```

## Database <br>

Make sure that you have setup your database credentials since we’re going to pull in data from the database <br>
```
mysql;
create database [DATABASE NAME];
exit
```

Create a database migration with a migration by adding the -m flag.
```
php artisan make:model Product -m; 
```

Open the products migration inside the ```~/database/migrations``` folder and replace the up() method with
```ruby
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->double('original_price');
        $table->tinyInteger('in_stock')->default( 1 );
        $table->tinyInteger('status')->default( 0 );
        $table->timestamps();
    });
}
```

Obviously, don't forget to migrate your tables :).
```
php artisan migrate
```

# Create custom Artisan command <br>
If you perform ```php artisan list```, you’ll find a complete list of Artisan commands that you can perform. If you scroll up to the ```make``` section, you’ll see that the third command is a ```make:command```, which will create a new artisan command for you. <br>
```
php artisan make:command CreateNewProduct
```

This will create a new class inside the ```~/app/Console/Commands``` folder called CreateNewProduct.php. 

The ```$signature``` property will be the Artisan command that you need to run inside the CLI to use the command and the ```$description``` will be the description of the custom command. Let’s change it to the following
```ruby
protected $signature = 'create:product';
protected $description = 'Create a new product through Artisan';
```

Since we’re not working with an interface but with a command line interface, we got to make sure that we interact with the user. This can be done through the ```ask()``` method.

Then, make sure that you import ```App\Models\Product``` since we’re going to use Eloquent to interact with our ```Products``` table.
```ruby
$title = $this->ask('What is the product title?: ');
$original_price = $this->ask('What is the product price?: ');
$stock = $this->ask('Is the product in stock?: ');
$status = $this->ask('What is the product status?: ');

Product::create([
    'title' => $title,
    'original_price' => $original_price,
    'in_stock' => $stock,
    'status' => $status
]);

$this->info('Product has been created!');
```

