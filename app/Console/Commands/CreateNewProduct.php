<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateNewProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product through Artisan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Ask questions through the CLI
        $title = $this->ask('What is the product title?: ');
        $original_price = $this->ask('What is the product price?: ');
        $stock = $this->ask('Is the product in stock?: ');
        $status = $this->ask('What is the product status?: ');

        //Use Eloquent to create a new Product through the CLI
        Product::create([
            'title' => $title,
            'original_price' => $original_price,
            'in_stock' => $stock,
            'status' => $status
        ]);

        //Return a message back to the user
        $this->info('Product has been created!');
    }
}
