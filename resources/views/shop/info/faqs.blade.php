@extends('shop.layouts.master')
@section('content')
 <!-- Breadcrumb Area Start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="/"> <i class="fas fa-home"></i> Home</a></li>
                        <li>Frequently asked questions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->
<div class="container mb-5 ml-5 mt-5">
    <div class="row">
 
        <div class="col-lg-12" style="color:black">{!!$faqs->description!!}</div>
    </div>
    
</div>
@endsection