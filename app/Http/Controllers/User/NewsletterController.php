<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsletterSubscriber;
use DB, Redirect, Input;

class NewsletterController extends Controller
{
    function subscribe(Request $request){
        $newsLetterSubscriber = new NewsletterSubscriber();
        $count = DB::table('newsletter_subscribers')->where('email',$request->input('email'))->count();
        if($count>0){
            flash('You\'ve subscribed to our Newsletter already')->success();
            return Redirect::back();
            //return Redirect::back();
        }else{
            $email  = $request->input('email');
            $newsLetterSubscriber->email = $email;
            /*$newsLetterSubscriber = DB::table('news_letter_subscribers')->insert(
                ['email' => $email]
            );*/
            if($newsLetterSubscriber->save()){
                flash('You\'ve successfully subscribed to our Newsletter')->success();
                return Redirect::back();
                //return Redirect::back();
            }
        }

    }
}
