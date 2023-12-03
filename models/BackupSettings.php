<?php namespace EgerStudio\BackupEasy\Models;

use October\Rain\Database\Model;

class BackupSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // Unique code
    public $settingsCode = 'vendorname_pluginname_backup_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
