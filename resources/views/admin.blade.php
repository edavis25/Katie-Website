@extends('layouts.app')

@section('content')

<section class="container">
  <h1>Admin Dashboard</h1>

  @if (session()->has('status'))
    <div class="alert alert-dismissable alert-{{ session()->get('status')['type'] }}">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <b>{{ session()->get('status')['message'] }}</b>
    </div>
  @endif

  <div class="card mt-4">
    <h4 class="card-header bg-pink text-white">Products</h4>
    <div class="card-body">
      <p>
        Create and manage products for sale
      </p>
      <a href="{{ url('/products/create') }}" class="btn btn-success mr-2">
        Add New Product
      </a>
      <a href="#" class="btn btn-primary text-white">
        Manage Products
      </a>
    </div>
  </div>

  <div class="card mt-4">
    <h4 class="card-header bg-purple text-white">Blog</h4>
    <div class="card-body">
      <p>
        Create and manage blog posts
      </p>
    </div>
  </div>
  
  <div class="card mt-4">
    <h4 class="card-header bg-orange text-white">Recipes</h4>
    <div class="card-body">
      <p>
      Create and manage recipes
      </p>
    </div>
  </div>
</section>

@endsection
