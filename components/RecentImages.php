<?php namespace Deanosborne\Philter\Components;

use Auth;
use Cms\Classes\ComponentBase;
use deanosborne\philter\models\Image as ImageModel;

class RecentImages extends ComponentBase
{
    public $images;

    public function componentDetails()
    {
        return [
            'name'        => 'RecentImages Component',
            'description' => 'Handles recent image display..'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRender()
    {
        $user = Auth::getUser();
        if (is_object($user)) {
            $this->images = ImageModel::othersImages($user->id)->latest()->get();
        } else {
            $this->images = ImageModel::latest()->get();
        }
    }
}
