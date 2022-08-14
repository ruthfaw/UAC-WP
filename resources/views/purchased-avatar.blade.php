@extends('master')

@section('title', 'Purchased Avatar')

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
    <a class="btn btn-prim" href="/view-purchased-avatar/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
    <a class="btn btn-prim" href="/view-purchased-avatar/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
</div>
<div class="avatar" style="padding-bottom: 50px;min-height:73vh;">
    <div class="container d-flex flex-column align-items-center gap-2 mt-4" style="color: #141a47;">
        <h1>@lang('avatar.title_prc')</h1>
        @foreach($avatars as $avatar)
            <div class="card w-100 shadow bg-white rounded">
                <div class="row g-0 m-4">
                    <div class="col">
                        <img src="/avatarImage/{{$avatar->image_avatar}}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="50" width="90">
                    </div>
                    
                    <div class="col-md-7">
                        <div class="card-body">
                            <h4 class="card-title" style="color:#141a47;font-size:28px;">{{$avatar->name_avatar}}</h4>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
                        <div class="row" >  
                            <h5 class="card-text">{{number_format($avatar->price_avatar)}} @lang('avatar.coin')</h5>
                        </div>

                        <div class="row manage-btn g-1">
                            <div class="col">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>
@endsection