<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Review;
use App\Route;
use Input, Auth;

class ReviewsController extends Controller
{
    function submitReview(){
    	$review = new Review();
    	$booking_rating = Booking::find(Input::get('booking_id'));
    	$route = Route::find($booking_rating->route_id);
    	//return $route;
        $review->booking_id  = Input::get('booking_id');
        $review->rating  = Input::get('rating');
        $review->review_message  = Input::get('review');
        if(Auth::guard('user')->check()){
            $review->user_id  = Auth::guard('user')->id();

            $id = Input::get('booking_id');

            if($review->save()){

                $rate = Review::where('booking_id',Input::get('booking_id'))->get();
                $i = 0;
                $j = 0;
                $r = sizeof($rate);
                foreach ($rate as $rates){
                    while ($i<$r){
                        $j=$j+$rate[$i]['rating']; $i++;
                    }
                }
                if($j>0){
                    $av = round($j/$r);
                    $route->rating = round($j/$r);
                }else{
                    $route->rating = 0;
                }

                //return $av;
                if($route->save())
                    flash('Your review and rating was added successfully')->success();
                return redirect()->back();
            }
        }else{
            flash('Please Login before adding review')->success();
            return redirect(route('user.login.register'));
        }
    }
}
