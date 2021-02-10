<?php


namespace iAmirNet\HesabFa\Models;

use Model;

class HesabFaSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'iamirnet_accounting_settings';
    public $settingsFields = '$/iamirnet/hesabfa/models/settings/fields_hesabfa.yaml';
}