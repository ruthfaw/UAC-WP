<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\FieldOfWork;
use App\Models\PurchaseAvatar;
use App\Models\User;
use App\Models\UserField;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function viewHome($locale='en'){
        App::setLocale($locale);
        $user = User::where('visibility', true)->get();
        $userfield = UserField::all();
        return view('home', ['users' => $user, 'userfields' => $userfield]);
    }

    public function viewGender($id, $locale='en'){
        App::setLocale($locale);
        if($id == 1){
            $user = User::where('gender', 'M')->get();
        }else{
            $user = User::where('gender', 'F')->get();
        }
        
        $userfield = UserField::all();
        return view('gender', ['users' => $user, 'userfields' => $userfield]);
    }

    public function searchPeople(Request $request){
        $fow = FieldOfWork::where('field_name', 'LIKE', "%$request->keyword%")->get();
        $userfield = UserField::all();
        $users = User::all();
        $userfields = array();
        $userArray = array();
        $x = -1;

        foreach($fow as $fw){
            foreach($userfield as $uf){
                if($fw->id == $uf->field_of_work_id){
                    $x += 1;
                    $userfields[$x] = $uf;
                }
            }
        }

        $y = -1;
        foreach($userfields as $ufs){
            foreach($users as $us){
                if($ufs->user_id == $us->id){
                    $y += 1;
                    $userArray[$y] = $us;
                }
            }
        }
        return view('search-result', ["users" => $userArray, 'userfields' => $userfield]);
    }

    public function viewProfile($id, $locale='en'){
        App::setLocale($locale);
        $user = User::where('id', $id)->first();
        return view('profile', ['user' => $user]);
    }

    public function viewDetails($id, $sign, $locale='en'){
        App::setLocale($locale);
        if($sign == 1){
            $user = User::where('id', $id)->first();
            $wish =  Wishlist::where('user_id', Auth::user()->id)->where('friend_id', $id)->first();
        }else{
            $user = User::where('id', $id)->first();
            $wish =  Wishlist::where('user_id', $id)->where('friend_id', Auth::user()->id)->first();
        }
        return view('user-detail', ['user' => $user, 'wish' => $wish, 'sign' => $sign]);
    }

    public function viewSentAvatar($id, $locale='en'){
        App::setLocale($locale);
        $avatar = Avatar::all();
        return view('send-avatar', ['avatars' => $avatar, 'friendId' => $id]);
    }

    public function viewAvatar($locale = 'en'){
        App::setLocale($locale);
        $avatar = Avatar::all();
        return view('avatar', ['avatars' => $avatar]);
    }

    public function viewPurchasedAvatar($locale = 'en'){
        App::setLocale($locale);
        $purchasedAvatar = PurchaseAvatar::where('user_id', Auth::user()->id)->get();
        $avatars = array();
        $x = -1;

        foreach($purchasedAvatar as $pa){
           $avtr = Avatar::where('id', $pa->avatar_id)->first();
                $x += 1;
                $avatars[$x] = $avtr;
           }

        return view('purchased-avatar', ['avatars' => $avatars]);
    }
       
    public function viewTopUp(){
        $user = User::where('id', Auth::user()->id)->first();
        $wallet = $user->wallet;
        return view('top-up', ['wallet' => $wallet]);
    }

    public function viewVisibilitySetting($locale = 'en'){
        App::setLocale($locale);
        $user = User::where('id', Auth::user()->id)->first();
        $visibility = $user->visibility;
        return view('change-image', ['visibility' => $visibility]);
    }

    public function viewWishlist($locale = 'en'){
        App::setLocale($locale);
        $wishlist =  Wishlist::where('user_id', Auth::user()->id)->get();
        $friends = array();
        $responses = array();
        $x = -1;

        foreach($wishlist as $wl){
           $user = User::where('id', $wl->friend_id)->first();
           if($user != null){
                $x += 1;
                $friends[$x] = $user;
                $responses[$x] = $wl->response;
           }
        }
        return view('wishlist', ["friends" => $friends, "responses" => $responses]);
    }

    public function viewRequest($locale = 'en'){
        App::setLocale($locale);
        $requests =  Wishlist::where('friend_id', Auth::user()->id)->get();
        $users = array();
        $responses = array();
        $x = -1;

        foreach($requests as $rq){
           $friend = User::where('id', $rq->user_id)->first();
           if($friend != null){
                $x += 1;
                $users[$x] = $friend;
                $responses[$x] = $rq->response;
           }
        }
        return view('friend-request', ["friends" => $users, "responses" => $responses]);
    }

    public function viewVideoCallFacility($locale = 'en'){
        App::setLocale($locale);
        $day = rand(1, 2);
        $date = rand(1, 30);
        $month = rand(1, 12);
        $clock = rand(7, 17);
        return view('videocall', ['day' => $day, 'date' => $date, 'month' => $month, 'clock' => $clock]);
    }
}
