<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class BlogTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:test {--refresh : Rebuild sqlite database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test blog by phpunit';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('refresh')) {
            $this->Info('test_database.sqlite is rebuilding...');
            Storage::disk('test')->put('test_database.sqlite', '');
            $this->info("test_database.sqlite has been built.\r\n");
        }

        $this->info('phpunit testing...');

        exec('phpunit', $output);

        foreach ($output as $line) {
            $this->line($line);
        }
    }

}
