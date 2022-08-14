<?php

namespace App\Http\Controllers;

use App\Models\FieldOFWork;
use App\Models\User;
use App\Models\UserField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function viewForm($locale = 'en'){
        App::setLocale($locale);
        $field_of_works = FieldOFWork::all();
        $prices = rand(100000, 125000);
        return view('register', ["field_of_works" => $field_of_works, "prices" => $prices]);
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'gender' => 'required|in:M,F',
            'profession' => 'required',
            'fieldOfWork' => 'required|min:3',
            'linkedIn' => 'required',
            'mobileNumber' => 'numeric',
            'image' => 'required',
            'image.*'=>'mimes:jpg,png,svg,jpeg',
        ],[ 
            'min' => 'The field of work must consist of 3 options at the least',
            'mimes'   => 'file type is not supported'   
        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->profession = $request->profession;
        $user->linkedIn = 'https://www.linkedin.com/in/'.$request->linkedIn;
        $user->mobileNumber = $request->mobileNumber;
        $user->image = $imageName;
        $user->oriImage = $imageName;
        $user->visibility = true;
        // wallet will be filled of 100 coins in the beginning of registration
        $user->wallet = 100;
        $user->save();
        $user_id = $user->id;

        $request->image->move(public_path('profileImage'), $imageName);
    
        foreach($request->fieldOfWork as $fows){
           $fow = new UserField();
           $fow->user_id = $user_id;
           $fow->field_of_work_id = $fows;
           $fow->save();
        }

        if($user_id != null){
            return view('register-payment', ["prices" => $request->price, 'user_id' => $user_id]);
        }else{
            return redirect()->back()->with('error','Registration failed!');
        }
    }

    public function viewPayment($locale = 'en', $id, $price){
        App::setLocale($locale);
        return view('register-payment', ['user_id' => $id, 'prices' => $price]);
    }

    public function checkPayment(Request $request){
        $priceToPay = $request->price;
        $pricePaid = $request->payment_amount;
        $extra = $pricePaid - $priceToPay;

        $walletOwner = User::where('id', $request->user_id)->first();
        $wallet = $walletOwner->wallet;
       
        $wallet += $extra;
        $walletOwner->wallet = $wallet;
        $walletOwner->save();
       
        return redirect('/home/en');
    }

    // public function viewModal(){
    //     return view('regModal');
    // }
}
