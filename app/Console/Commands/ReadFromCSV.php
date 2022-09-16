<?php

namespace App\Console\Commands;

use App\Jobs\SaveToDatabaseFromCSV;
use Illuminate\Console\Command;

class ReadFromCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:readfromcsv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command read from CSV and save them to database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->readCSV(base_path("organizations.csv"),',');
        $this->info('Completed');
    }

    public function readCSV($csvFile, string $delimiter)
    {
        $array = [];
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $temp = fgetcsv($file_handle, 0, $delimiter);
            if ( $temp === false) {
                continue;
            }
            $array [] = $temp;

            SaveToDatabaseFromCSV::dispatch($temp);
        }
        fclose($file_handle);
    }

}
