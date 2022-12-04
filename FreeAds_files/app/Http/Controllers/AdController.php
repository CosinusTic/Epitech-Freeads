<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $title;
    protected $category;
    protected $description;
    protected $image_URL;
    protected $price;
    protected $location;

    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function DisplayAdminView($id)
    {
        $user_id = Users::find($id);
        return view("admin", ["ads" => Ad::all(), "users" => User::all(), "user_id" => $user_id]);
    }

    public function DisplayAllAdsTitles()
    {
        $ads = Ad::all();
        return $ads;
    }

    public function DisplayAdsCount()
    {
        $ads_count = Ad::all()->count();
        echo $ads_count;
    }

    public static function displayProductsManagement() //creates a reference to ads in the adsManagement
    {
        return view("adsManagement", ["ads" => Ad::all()]);
    }

    public static function displayProductsInHome($id)
    {
        $user = Users::find($id);
        $ads = Ad::all();
        return view("home/adsHome", ["ads" => $ads, "user" => $user]);
    }


    public function search(Request $request, $id){
        // Get the search value from the request
        $search = $request->input('searched_item');
        $user = Users::find($id);
        // Search in the title and body columns from the posts table
        $posts = Ad::where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('home.adsSearch', compact('posts'), ["user" => $user]);
    }

    public static function deleteAd($id)
    {
        $ad_to_delete = Ad::where('id', $id)->firstOrNew(); 
        $ad_title_before_deletion = $ad_to_delete->name; 
        $ad_to_delete->delete();
        return "sucessfully deleted ad " . $ad_title_before_deletion;
    }

    public function displayUpdateAd($id)
    {
        $ad_to_update = Ad::find($id);
        return view("ads.update", ["ad_to_update" => $ad_to_update]);
    }

    public function displayPostAdView($id)
    {
        $user = Users::find($id);
        return view("ads.postAd", ["user" => $user]);
    }

    public function addAnAdvert(Request $request)
    {
        $advert_to_post = new Ad();
        $advert_to_post->title = $request->title;
        $advert_to_post->category = $request->category;
        $advert_to_post->description = $request->description;
        $advert_to_post->image_URL = $request->image_URL;
        $advert_to_post->price = $request->price;
        $advert_to_post->location = $request->location;
        $advert_to_post->save();
        return "Sucessfully added advert: " . $advert_to_post->title . " for " . $advert_to_post->price . "$.";
    }

    public static function updateAd($id, Request $request)
    {
        $ad_to_update = Ad::find($id);

        /* -- old credentials -- */
        $old_title = $ad_to_update->title;
        $old_category = $ad_to_update->category;
        $old_description = $ad_to_update->description;
        $old_image_URL = $ad_to_update->image_URL;
        $old_price = $ad_to_update->price;
        $old_location = $ad_to_update->location;

        /* -- Enabling to not fill fields -- */
        if($request->title == NULL)
        {
            $request->title = $old_title;
        }
        if($request->category == NULL)
        {
            $request->category = $old_category;
        }
        if($request->description == NULL)
        {
            $request->description = $old_description;
        }
        if($request->image_URL == NULL)
        {
            $request->image_URL = $old_image_URL;
        }
        if($request->price == NULL)
        {
            $request->price = $old_price;
        }
        if($request->location == NULL)
        {
            $request->location = $old_location;
        }

        /* -- new credentials -- */
        $ad_to_update->title = $request->title;
        $ad_to_update->category = $request->category;
        $ad_to_update->description = $request->description;
        $ad_to_update->image_URL = $request->image_URL;
        $ad_to_update->price = $request->price;
        $ad_to_update->location = $request->location;
        /* -- Update ad with info above -- */

        dump($ad_to_update);
        dump($old_title);
        dump($ad_to_update->title);
        $ad_to_update->save();
        return "ad " . $old_title . " successfully updated to " . $ad_to_update->title;
    }
}

