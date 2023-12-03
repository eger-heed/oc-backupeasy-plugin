<?php namespace EgerStudio\BackupEasy;

use Backend;
use System\Classes\PluginBase;
use EgerStudio\BackupEasy\Models\BackupSettings;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'BackupEasy',
            'description' => 'No description provided yet...',
            'author' => 'EgerStudio',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->registerConsoleCommand('backup.run', 'EgerStudio\BackupEasy\Console\BackupCommand');
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'EgerStudio\BackupEasy\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'egerstudio.backupeasy.some_permission' => [
                'tab' => 'BackupEasy',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'backupeasy' => [
                'label' => 'BackupEasy',
                'url' => Backend::url('egerstudio/backupeasy/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['egerstudio.backupeasy.*'],
                'order' => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Backup Settings',
                'description' => 'Configure backup settings.',
                'category'    => 'System',
                'icon'        => 'icon-cog',
                'class'       => 'EgerStudio\BackupEasy\Models\BackupSettings',
                'order'       => 500,
                'keywords'    => 'backup schedule'
            ]
        ];
    }

    public function registerSchedule($schedule)
    {
        $settings = BackupSettings::instance();
        $frequency = $settings->backup_frequency;
        $time = $settings->backup_time ?? '01:00';

        switch ($frequency) {
            case 'hourly':
                $schedule->call(function () {
                    // Trigger backup
                })->hourly();
                break;

            case 'daily':
                $schedule->call(function () {
                    // Trigger backup
                })->dailyAt($time);
                break;

            case 'weekly':
                $schedule->call(function () {
                    // Trigger backup
                })->weekly()->at($time);
                break;

            // Add more cases as needed
        }
    }


}
