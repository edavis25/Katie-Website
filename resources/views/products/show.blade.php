@extends('layouts.app')

@section('content')

<section class="container page-content mt-0">
  {{ $product->name }}
  <br>
  {{ $product->description }}
  <br>
  @foreach ($product->images as $img)
    @if ($img->featured)
      {{ $img->original_name }}
    @endif
  @endforeach
</section>

@endsection
