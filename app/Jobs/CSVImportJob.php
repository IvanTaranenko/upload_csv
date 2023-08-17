<?php

namespace App\Jobs;

use App\Imports\CSVImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CSVImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $chunk;

    public function __construct($chunk)
    {
        $this->chunk = $chunk;
    }

    public function handle()
    {
        $import = new CSVImport();
        foreach ($this->chunk as $row) {
            $import->model($row);
        }
    }
}
