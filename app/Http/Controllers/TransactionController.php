<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\PurchaseAvatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function purchaseAvatar(Request $request){
        $check = PurchaseAvatar::where('user_id', Auth::user()->id)->where('avatar_id', $request->avatar_id)->first();
        
        $walletOwner = User::where('id', Auth::user()->id)->first();
        $wallet = $walletOwner->wallet;
        $avatar = Avatar::where('id', $request->avatar_id)->first();
        $avatarPrice = $avatar->price_avatar;

        if($wallet < $avatarPrice){
            return redirect()->back()->with(['warning' => 'You don\'t have enough coins']);
        }

        if($check){
            return redirect()->back()->with(['warning' => 'Avatar has been purchased']);
        }

        $pAvatar = new PurchaseAvatar();
        $pAvatar->user_id = Auth::user()->id;
        $pAvatar->avatar_id = $request->avatar_id;
        $pAvatar->save();

        $wallet -= $avatarPrice;
        $walletOwner->wallet = $wallet;
        $walletOwner->save();

        return redirect()->back()->with(['alert' => 'Success purchase avatar']);
    }

    public function sendPurchaseAvatar(Request $request){
        $check = PurchaseAvatar::where('user_id', $request->friend_id)->where('avatar_id', $request->avatar_id)->first();
        
        $walletOwner = User::where('id', Auth::user()->id)->first();
        $wallet = $walletOwner->wallet;
        $avatar = Avatar::where('id', $request->avatar_id)->first();
        $avatarPrice = $avatar->price_avatar;

        if($wallet < $avatarPrice){
            return redirect()->back()->with(['warning' => 'You don\'t have enough coins']);
        }

        if($check){
            return redirect()->back()->with(['warning' => 'Avatar has been purchased']);
        }

        $pAvatar = new PurchaseAvatar();
        $pAvatar->user_id = $request->friend_id;
        $pAvatar->avatar_id = $request->avatar_id;
        $pAvatar->save();

        $wallet -= $avatarPrice;
        $walletOwner->wallet = $wallet;
        $walletOwner->save();

        return redirect()->back()->with(['alert' => 'Success purchase avatar']);
    }

    public function topUpProcess(){
        $walletOwner = User::where('id', Auth::user()->id)->first();
        $wallet = $walletOwner->wallet;
        $wallet += 100;

        $user = User::findOrFail(Auth::user()->id);
        $user->wallet = $wallet;
        $user->save();
        return redirect()->back()->with(['alert' => 'Success top-up coins']);
    }

    public function setInvisible(){
        $user = User::where('id', Auth::user()->id)->first();
        $wallet = $user->wallet;
        $wallet -= 50;
        $indexBear = rand(1, 3);

        $user = User::findOrFail(Auth::user()->id);
        $user->image = $indexBear.'.jpg';
        $user->wallet = $wallet;
        $user->visibility = false;
        $user->save();

        return redirect()->back()->with(['alert' => 'Success setting invisible']);
    }

    public function setVisible(){
        $user = User::where('id', Auth::user()->id)->first();
        $wallet = $user->wallet;
        $wallet -= 5;

        $user = User::findOrFail(Auth::user()->id);
        $user->image = $user->oriImage;
        $user->wallet = $wallet;
        $user->visibility = true;
        $user->save();

        return redirect()->back()->with(['alert' => 'Success setting visible']);
    }
}
