@extends('shop.layouts.master')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');
    .body{
        margin-top: 20vh;
        margin-bottom: 40vh;
    }
    .thanks{
        text-align: center;
        font-size: 30px;
        font-family: 'Kaushan Script', cursive;
    }
    .smile{ color:#146CDA;}
    .button{
        background: #146CDA;
        color: white
    }
    .button a{ color: white; }
    .button:hover{
        background: #146CDA;
        opacity: .8;
        color: white
    }
</style>
<div class="container body">
    <div class="row">
        <div class="col-lg-12 thanks">
            Thank you for your feedback <i class="fas fa-smile smile"></i>
        </div>
        <div class="col-lg-12 thanks mt-5">
           <button class="btn button"><a href="/">Back to Home</a></button>
        </div>
    </div>
</div>
@endsection