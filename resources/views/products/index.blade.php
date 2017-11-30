@extends('layouts.app')

@section('content')

<section class="page-heading">
  <img src="{{ asset('img/art.jpg') }}" class="img-fluid" />
</section>

<section class="page-content container">
  <div class="row">
    <h1>Products</h1>
  </div>
  <div class="row">
    <nav class="breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
      <span class="breadcrumb-item active">Products</span>
    </nav>
  </div>
  <div class="row">
    <p class="col-lg-9 pl-0">
      Multos singulis arbitror ut cillum ingeniis hic multos elit. Excepteur quem expetendis commodo id fore sed ne quid litteris.
      Labore cohaerescant aliquip quis nostrud si ut culpa consequat arbitror. Quis instituendarum proident cillum litteris ita
      excepteur culpa aut possumus efflorescere.
    </p>
  </div>
  <div class="row">
    <div class="filters col-md-4 col-lg-3 pl-0">
      amet sint noster sunt fore enim legam nisi aute tamen amet veniam velit amet
      quis cillum duis legam esse multos
    </div>
    <div class="col-md-8 col-lg-9">
      Aliqua deserunt efflorescere non o quorum eiusmod deserunt.

      Mentitum quo laborum ne quo elit est noster.

      Ne singulis despicationes, mentitum ex aute.

      Excepteur noster nostrud et labore officia ex aliquip.

      Ea pariatur eu quamquam, ubi illum voluptatibus.
    </div>
  </div>
</section>

@endsection
