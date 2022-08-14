<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addWishlist(Request $request){
        $check = Wishlist::where('user_id', Auth::user()->id)->where('friend_id', $request->friend_id)->first();
        $check2 = Wishlist::where('user_id', $request->friend_id)->where('friend_id', Auth::user()->id)->first();
        
        if($check){
            return redirect()->back()->with(['warning' => 'Friend has been added to wishlist']);
        }elseif($check2){
            // if(is_null($check2->response)){  
                $check2->response = true;
                $check2->save();
                return redirect()->back()->with(['alert' => 'Success accepting friend request']);
            // }else if($check2->response == true){
            //     return redirect()->back()->with(['warning' => 'You/the other party have accepted friend request']);
            // }else if($check2->response == false){
            //     return redirect()->back()->with(['danger' => 'You/the other party have rejected friend request']);
            // }
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->friend_id = $request->friend_id;
        $wishlist->save();
        return redirect()->back()->with(['alert' => 'Success add wishlist']);
    }

    public function rejectRequest(Request $request){
        $wishlist = Wishlist::where('user_id', $request->friend_id)->where('friend_id', Auth::user()->id)->first();
        // if(is_null($wishlist->response)){
            $wishlist->response = false;
            $wishlist->save();
            return redirect()->back()->with(['alert' => 'Success rejecting friend request']);
        // }else if($wishlist->response == true){
        //     return redirect()->back()->with(['warning' => 'You/the other party have accepted friend request']);
        // }else if($wishlist->response == false){
        //     return redirect()->back()->with(['danger' => 'You/the other party have rejected friend request']);
        // }
    }

    public function removeWishlist(Request $request){
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('friend_id', $request->friend_id)->delete();
        return redirect()->back()->with(['success', 'Success Delete Item from Cart']);
    }
}
