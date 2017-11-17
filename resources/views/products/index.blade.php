@extends('layouts.app')

@section('content')
<ul>
@foreach ($products as $product)
    <li>{{ $product->name }} {{ $product->description }}</li>
@endforeach
</ul>
@endsection