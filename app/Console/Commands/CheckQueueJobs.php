<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class CheckQueueJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
       protected $signature = 'queue:check-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       
       
        $failedJobs = DB::table('failed_jobs')->get();
        $pendingJobs = DB::table('jobs')->count();

        if ($failedJobs->isNotEmpty()) {
            Log::warning('Failed Jobs:', $failedJobs->toArray());
        }

        Log::info("Pending Jobs: $pendingJobs");

        $this->info("Checked jobs. Failed: {$failedJobs->count()}, Pending: $pendingJobs");
       
    
    }
}
