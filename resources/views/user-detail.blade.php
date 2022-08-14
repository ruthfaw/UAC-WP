@extends('master')

@section('title', 'User Detail')

@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@elseif (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
<div class="d-flex justify-content-center gap-4">
    <a class="btn btn-prim" href="/details/{{$user->id}}-{{$sign}}-id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
    <a class="btn btn-prim" href="/details/{{$user->id}}-{{$sign}}-en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
</div>
<div class="text-center" style="margin-top: 25px;"><h2 class="title">@lang('userDetail.title')</h2></div>
<div class="container d-flex justify-content-center py-5" style="margin-left:150px;">
    <div id="image-detail" class="col flex-shrink">
        @if($user->visibility == 1)
            <img class="detail-img" src="/profileImage/{{$user->image}}" alt="slide" width="700px" height="500px" style="border-radius: 30px;">
        @elseif($user->visibility == 0)
            {{-- {{dd($user->image)}} --}}
            <img class="detail-img" src="{{$user->image}}" alt="slide" width="700px" height="500px" style="border-radius: 30px;">
        @endif
    </div>
    <div class="col details align-self-center flex-grow-1" style="margin-left: 100px;">
        <div class="title username fs-1" style="margin-top:-80px;font-size:30px;">{{$user->username}}</div>
        <div class="title gender" style="color:rgb(102, 96, 96); font-weight:500; font-size:25px; margin-top:30px;margin-bottom: 25px;">
            <img class="detail-img d-inline" src="/iconDetails/gender.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            @if($user->gender == 'M')
                @lang('userDetail.gender.m')  
            @elseif($user->gender == 'F')
                @lang('userDetail.gender.f') 
            @endif
        </div>
        <div class="title1 profession" style="margin-bottom: 25px; color:rgb(102, 96, 96); font-weight:500; font-size:25px;">
            <img class="detail-img d-inline" src="/iconDetails/profession.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            {{$user->profession}}
            {{-- {{$user->image}} --}}
        </div>
        <div class="title2 linkedIn" style="margin-bottom: 25px; color:rgb(102, 96, 96); font-weight:500; font-size:21px;">
            <img class="detail-img d-inline" src="/iconDetails/linkedIn.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            {{$user->linkedIn}}
        </div>
        <div class="title3 mobileNumber" style="margin-bottom: 30px; color:rgb(102, 96, 96); font-weight:500; font-size:25px;">
            <img class="detail-img d-inline" src="/iconDetails/mobileNumber.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            {{$user->mobileNumber}}
        </div>
        <div class="justify-content-between">
            <form action="/add-wishlist" method="post" class="d-inline">
                @csrf
                <input type="hidden" name="friend_id" value="{{$user->id}}">
                <button class="thumbs-up btn btn-prim btn-lg" type="submit" style="padding: 5px 100px">
                    <img class="detail-img" src="/iconDetails/like.png" alt="slide" width="35px" height="30px">
                </button>
            </form>
            <a class="sent-avatar btn btn-prim btn-lg" href="/sent-avatar/{{$user->id}}" style="padding: 5px 75px;color:white">@lang('userDetail.btn.sa')</button>
            <a class="btn btn-primary btn-lg d-flex text-center<?php if(is_null($wish)||$wish->response == 0){?> disabled <?php } ?>" href="/videocall" role="button" style="color:white;padding: 5px 190px;margin-top:20px;background-color:#1C3879">@lang('userDetail.btn.vc')</a>
        </div>
    </div>
@endsection