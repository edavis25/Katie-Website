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
  <!-- Search Filters -->
  <div class="row mt-3">
    <div class="filters col-md-4 col-lg-3 pl-0">
      <h3>Filters</h3>
      <hr>
      {!! Form::open(['route' => 'products.index', 'method' => 'get', 'id' => 'search-form']) !!}
        <div class="form-group">
          {!! Form::label('search', 'Keyword') !!}
          {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search by keywords...']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('categories', 'Categories', ['class' => 'd-block']) !!}
          @foreach ($categories as $key=>$cat)
            <span class="badge" data-catid="{{ $key }}">{{ $cat }}</span>
          @endforeach
        </div>
        <div class="form-group">
          {!! Form::submit('Search', ['class' => 'btn btn-info mt-4', 'style' => 'width: 100%']) !!}
        </div>
      {!! Form::close() !!}
    </div>

    <div class="col-md-8 col-lg-9">
      @foreach ($products as $product)
        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
        <br>
      @endforeach
    </div>
  </div>
</section>

@endsection

@section('scripts')
  @parent

  <script>
    // Add and remove hidden form fields for selected categories
    $('.badge').on('click', function() {
      if ($(this).hasClass('active')) {
        // If already active on click, deselect and remove hidden field from DOM
        let catId = $(this).attr('data-catid');   // Category ID stored in data-catid attribute
        // Remove hidden form field
        $('input[type="hidden"][value="'+ catId +'"]').remove();
        $(this).removeClass('active');
      }
      else {
        // Select the category on click - add active class and create hidden form field
        let catId = $(this).attr('data-catid');   // Category ID stored in data-catid attribute
        // Add hidden form field
        let hidden = '<input type="hidden" name="categories[]" value="' + catId + '" />';
        $('#search-form').append(hidden);
        $(this).addClass('active');
      }
    });
  </script>
@endsection
