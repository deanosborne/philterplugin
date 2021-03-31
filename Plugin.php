<?php namespace deanosborne\Philter;
 
use System\Classes\PluginBase;
 
class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'deanosborne\Philter\components\RecentImages' => 'RecentImages',
            'deanosborne\Philter\components\UserImages' => 'UserImages',
            'deanosborne\Philter\Components\AddImages' => 'AddImages',
            'deanosborne\Philter\Components\DeleteImage' => 'DeleteImage',
        ];
    }

    public function registerSettings()
    {

    }
}