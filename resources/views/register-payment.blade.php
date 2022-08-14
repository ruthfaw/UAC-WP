@extends('master')

@section('title', 'Register Payment Page')

@section('authenticated-form')
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

<script>
    function checkAmount() {
        var inputPay = document.getElementById("payment_amount").value;
        var price = document.getElementById("price").value;

        if(inputPay < price){
            var debt = price - inputPay;
            alert("You are still underpaid " + debt);
            return false;
        }else{
            if(inputPay > price && !confirm("Sorry you overpaid " + (inputPay - price).toLocaleString() + ", would you like to enter a balance?")){
                return false;
            }

            return true;
        }
        
        //     var confirmOver =  confirm("Sorry you overpaid " extra + ", would you like to enter a balance?");
        
    }

       
</script>

<div class="d-flex justify-content-center gap-4">
    <a class="btn btn-prim" href="/register-payment/id-{{$user_id}}-{{$prices}}" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">Bahasa</a>
    <a class="btn btn-prim" href="/register-payment/en-{{$user_id}}-{{$prices}}" role="button" style="margin-top: 30px; margin-bottom: 25px; padding: 5px 80px;">English</a>
</div>
<div class="container-fluid py-3 d-flex justify-content-center h-100 col-xl-8">
    <div class="card card-body text-white shadow" style="border-radius: 0.5rem;background-color:white; padding: 80px 120px">
        <form action="/register-payment-process" method="post" onsubmit="return checkAmount()" class="mb-md-3" id="register-payment" enctype="multipart/form-data" style="color:#141a47;font-weight:500; font-size: 18px;">
            @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center" style="color:#141a47">@lang('regPayment.title')</h2>

            <div class="paymentTotal mb-4" style="font-size: 25px;">
                <label class="form-label" for="payment-total-title" style="color:#141a47">@lang('regPayment.total_price') :  IDR {{ number_format($prices) }}</label>
                <input type="hidden" name="price" id="price" value="{{$prices}}">
                <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
            </div>
            
            <div class="form-outline form-white mb-4">
                <label class="form-label" for="payment_amount">@lang('regPayment.your_pay')</label>
                <input type="number" name="payment_amount" id="payment_amount" class="form-control form px-5-control-lg" required style="background-color: #F9F5EB">
            </div>

            <div class="d-flex flex-column justify-content-between" style="margin-top: 35px;">
                <button class="btn btn-prim btn-lg px-3" type="submit">@lang('regPayment.pay')</button>
            </div>
        </form>
    </div>
</div>
@endsection
