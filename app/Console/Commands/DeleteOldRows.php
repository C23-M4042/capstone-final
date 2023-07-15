<?php

namespace App\Console\Commands;

use App\Models\Routine;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DeleteOldRows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:oldrows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete rows older than a certain date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rows = Routine::get();

        foreach ($rows as $row) {
            $createdAt = Carbon::parse($row->created_at);
            $now = Carbon::now();
            $differenceInDays = $now->diffInDays($createdAt);

            if ($differenceInDays > $row->hari) {
                Routine::where('id', $row->id)->delete();
            }
        }

        $this->info('Old rows deleted successfully.');
    }
}
