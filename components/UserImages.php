<?php namespace Deanosborne\Philter\Components;

use Cms\Classes\ComponentBase;
use Auth;
use deanosborne\Philter\Models\Image as ImageModel;

class UserImages extends ComponentBase
{
    public $images;
    public function componentDetails()
    {
        return [
            'name'        => 'UserImages Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRender()
    {
        $user = Auth::getUser();
        $this->images = [];
        if (is_object($user)) {
            $this->images = ImageModel::userImages($user->id)->get();
        }
    }
}
