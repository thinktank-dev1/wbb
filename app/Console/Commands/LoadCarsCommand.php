<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Excel;
use App\Imports\CarsImport;

class LoadCarsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cars:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load Vehicles from the transunion document (CodeAndDescriptionFull.csv)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->init();
    }

    public function init(){
        $file = '/var/www/html/wbb/storage/vehicle-codes/CodesAndDescriptionsFull0223.csv';
        Excel::import(new CarsImport, $file);
    }
}
