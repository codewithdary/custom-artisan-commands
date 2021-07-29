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
//        $headers = ['id', 'title', 'original_price', 'in_stock', 'status', 'Created at', 'Updated at'];
//        $data = Product::all()->toArray();
//        $this->table($headers, $data);

        $count = Product::all()->toArray();
        $this->output->progressStart(count($count));

        for ($i = 0; $i < count($count); $i++)
        {
            sleep(1);
            print_r($count);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
    }
}
