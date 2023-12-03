<?php namespace EgerStudio\BackupEasy\Console;

use Illuminate\Console\Command;
use EgerStudio\BackupEasy\Classes\Services\BackupService; // Assume this class handles the backup logic

class BackupCommand extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'backup:run';

    /**
     * @var string The console command description.
     */
    protected $description = 'Manually trigger the backup process.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Starting backup...');

        try {
            // Assuming BackupService handles the backup process
            $backupService = new BackupService();
            $backupService->backupDatabase(); // Or whatever method you have for backing up

            $this->info('Backup completed successfully.');
        } catch (\Exception $e) {
            $this->error('Backup failed: ' . $e->getMessage());
        }
    }
}
