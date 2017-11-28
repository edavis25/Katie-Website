@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container col-12 col-md-7">
            <div class="row">
                <div class="container col-12">
                    <img src="{{ asset('img/products-700x490.jpg') }}" alt="" class="feature-img img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="container col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('img/recipes-400x450.jpeg') }}" alt="" class="feature-img img-fluid">
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('img/about-400x450.jpg') }}" alt="" class="feature-img img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container col-12 col-md-5">
            <div class="row">
                <div class="container col-12">
                    <img src="{{ asset('img/blog-500x500.jpg') }}" alt="" class="feature-img img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="container col-12">
                    <img src="{{ asset('img/holiday-500x380.jpeg') }}" alt="" class="feature-img img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection