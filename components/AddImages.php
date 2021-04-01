<?php namespace Deanosborne\Philter\Components;

use Auth;
use Input;
use Flash;
use Redirect;
use Cms\Classes\ComponentBase;
use Deanosborne\Philter\Models\Image as ImageModel;
use Deanosborne\Philter\Models\Tag as TagModel;

class AddImages extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'AddImages Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function addImage()
    {
        $image = new ImageModel();
        $image->name = Input::get('name');
        $image->description = Input::get('description');
        $image->user = Auth::getUser();
        $image->image = Input::file('file');
        $image->filter = Input::get('filter');
        $image->save();
        $tags = Input::get('tags');
        $tag_array = explode(', ', $tags); 
        $tag_models = [];
        foreach ($tag_array as $tag) {
            $tag = ucfirst(strtolower(trim($tag)));
            $tag_models[] = TagModel::getTag($tag);
        }
        $image->tags()->attach($tag_models);
        $image->save();
        Flash::success('Your image has been uploaded');
        return Redirect::back();
    }
}