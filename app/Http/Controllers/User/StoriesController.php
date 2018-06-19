<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\UserTravelStory;
use Redirect;

class StoriesController extends Controller
{
    function submitStory(Request $request){

        $story = new UserTravelStory();

        $story->title = $request->input('title');
        $story->body = $request->input('blog-editor');
        $story->user_id = Auth::guard('user')->id();


        if($request->hasFile('photo')){
            $photoName = $request->input('title').'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $story->image = $photoName;

                $story->save();

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

                flash('Post added successfully')->success();
                return Redirect::back();

            }else{
                flash('file error')->success();
                return Redirect::back();
            }
        }else{
            flash('No image picked')->success();
            return Redirect::back();
        }



    }

    function resizePostImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

        Image::make($image_path)
            ->resize(810, 400)
            ->save(public_path().'/images/story/user_810x400/'.$image_name);

        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path().'/images/story/admin_listing_99x99/'.$image_name);

        Image::make($image_path)
            ->resize(150, 150)
            ->save(public_path().'/images/story/admin_listing_150x150/'.$image_name);

    }
}
