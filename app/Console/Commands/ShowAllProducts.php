<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ShowAllProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all available products';

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
     * @return array
     */
    public function handle()
    {
        //The table() method makes it simple to create ASCII tables full of your data. It accepts two parameters, the headers, and the data itself.
        //$headers = ['id', 'title', 'original_price', 'in_stock', 'status', 'Created at', 'Updated at'];
        //$data = Product::all()->toArray();
        //$this->table($headers, $data);

        //If you have ever run the npm install command, you've seen a command-line progress bar. Let's create one ourselves!
        $count = Product::all()->toArray();
        $this->output->progressStart(count($count)); //Will start the progress bar

        for ($i = 0; $i < count($count); $i++)
        {
            sleep(1); //will delay the execution of the current script with 1 second
            print_r($count); //Print the product that will be looped over.
            $this->output->progressAdvance(); //Increment every iteration.
        }

        $this->output->progressFinish(); //Makes sure that it knows when it needs to stop
    }
}
