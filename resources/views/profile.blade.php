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
    <a class="btn btn-prim" href="/profile/{{$user->id}}-id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
    <a class="btn btn-prim" href="/profile/{{$user->id}}-en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
</div>
<div class="text-center" style="margin-top: 15px;"><h2 class="title">@lang('profile.title')</h2></div>
<div class="container d-flex justify-content-center py-5" style="margin-left:150px;">
    <div id="image-detail" class="col flex-shrink">
        <img class="detail-img" src="/profileImage/{{$user->image}}" alt="slide" width="700px" height="500px" style="border-radius: 30px;">
    </div>
    <div class="col details align-self-center flex-grow-1" style="margin-left: 100px;">
        <div class="title username fs-1" style="margin-top:-80px;font-size:30px;">{{$user->username}}</div>
        <div class="title gender" style="color:rgb(102, 96, 96); font-weight:500; font-size:25px; margin-top:30px;margin-bottom: 25px;">
            <img class="detail-img d-inline" src="/iconDetails/gender.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            @if($user->gender == 'M')
               @lang('profile.gender.m')
            @elseif($user->gender == 'F')
                @lang('profile.gender.f')
            @endif
        </div>
        <div class="title1 profession" style="margin-bottom: 25px; color:rgb(102, 96, 96); font-weight:500; font-size:25px;">
            <img class="detail-img d-inline" src="/iconDetails/profession.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            {{$user->profession}}
        </div>
        <div class="title2 linkedIn" style="margin-bottom: 25px; color:rgb(102, 96, 96); font-weight:500; font-size:21px;">
            <img class="detail-img d-inline" src="/iconDetails/linkedIn.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            {{$user->linkedIn}}
        </div>
        <div class="title3 mobileNumber" style="margin-bottom: 30px; color:rgb(102, 96, 96); font-weight:500; font-size:25px;">
            <img class="detail-img d-inline" src="/iconDetails/mobileNumber.png" alt="slide" width="35px" height="30px" style="margin-right:15px;">
            {{$user->mobileNumber}}
        </div>
    </div>
@endsection