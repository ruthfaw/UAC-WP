@extends('master')

@section('title', 'Wishlist')

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
    <a class="btn btn-prim" href="/friend-request/id" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
    <a class="btn btn-prim" href="/friend-request/en" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
</div>
<div class="avatar" style="padding-bottom: 50px; min-height:73vh;">
    <div class="container d-flex flex-column align-items-center gap-2 mt-4" style="color: #141a47;">
        <h1>@lang('wishlist.title.fr')</h1>

        @if(empty($friends))
            <h2 style="margin-top:30px;color:rgb(184, 176, 176)">@lang('wishlist.emptytxt_fr')</h2>
        @endif
        
        @for ($i = 0; $i < count($friends); $i++)
            <a href="/details/{{$friends[$i]->id}}-2-en" class="card w-100 shadow bg-white rounded" style="text-decoration:none;color:#1c3879;">
                {{-- <div class="card w-100 shadow bg-white rounded"> --}}
                    <div class="row g-0 m-4">
                        <div class="col">
                            <img src="/profileImage/{{$friends[$i]->image}}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="100" width="150">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4 class="card-title">{{$friends[$i]->username}}</h4>
                                <div class="card-text">
                                    <div class="text-muted text-light" style="font-size:17px;">{{$friends[$i]->profession}}</div>
                                </div>
                                <div class="card-text">
                                    <div class="text-muted text-light" style="font-size:17px;">
                                        @if(is_null($responses[$i]))
                                            @lang('wishlist.bar.rq_wait')
                                        @elseif($responses[$i] == 1)
                                            @lang('wishlist.bar.rq_acc')
                                        @else
                                            @lang('wishlist.bar.rq_reject')
                                        @endif
                                    </div>
                                    {{-- $cartDetail->item->itemImages->first()->item_image --}}
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
    
                            <div class="row manage-btn g-1">
                                <div class="col">
                                    <form action="/reject-request" method="post">
                                        @csrf
                                        <input type="hidden" name="friend_id" value="{{$friends[$i]->id}}">
                                        <div class="button" style="margin-top:10px;">
                                            <button type="submit" class="btn" style="height: 35px; width: 105px">@lang('wishlist.bar.reject_bt')</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- <div class="col d-inline">
                                    <form action="/delete" method="post">
                                        @csrf
                                        <input type="hidden" name="avatar_id" value="{{$avatar->id}}">
                                        <div class="button" style="margin-top:10px;">
                                            <button type="submit" class="btn btn-danger" style="height: 35px; width: 80px">SENT</button>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </a>
        @endfor
    </div>
</div>
@endsection