<?php

namespace App\Jobs;

use App\Imports\BardcodenewImport;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $uploadFile;
    public $weaving;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uploadFile, $weaving)
    {
        $this->uploadFile = $uploadFile;
        $this->weaving = $weaving;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Excel::import(new BardcodenewImport($this->weaving), $this->uploadFile);
    }
}
