@extends('layouts.app')

@section('content')

<div class="container bg-white p-3">
  <h1>Create New Product</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {!! Form::open(['action' => 'ProductsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Product Name'); !!}<span class="text-danger">*</span>
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter product name...']); !!}
    </div>
    <div class="form-group">
      {!! Form::label('description', 'Description') !!}<span class="text-danger">*</span>
      {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Enter product description...']) !!}
    </div>
    <div class="form-group col-12 col-md-6 p-0">
      {!! Form::label('category_id', 'Category') !!}<span class="text-danger">*</span><br>
      {!! Form::select('category_id', $categories, null, ['class' => 'form-control d-inline-block', 'id' => 'category-select', 'style' => 'max-width: 55%;']) !!}
      <a class="" data-toggle="modal" data-target="#categoryModal" style="cursor: pointer">
        &nbsp;<span class="text-success"><span class="fa fa-plus"></span> New Category</span>
      </a>
      <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">New Category</button-->
    </div>
    <div class="form-group col-12 col-md-6 p-0">
      {!! Form::label('price', 'Price') !!}<span class="text-danger">*</span>
      {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'xx.xx', 'min' => '0', 'step' => '0.01']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('featured-image', 'Featured Image', ['class' => 'mb-0']) !!}<span class="text-danger">*</span>
      <small class="d-block">Upload only a single featured image</small>
      {!! Form::file('featured-image') !!}
    </div>
    <div class="form-group">
      {!! Form::label('images[]', 'Additional Images', ['class' => 'mb-0']) !!}
      <small class="d-block">Upload 1 or more additional images (optional)</small>
      {!! Form::file('images[]', ['multiple' => 'multiple']) !!}
    </div>
    {!! Form::submit('Create Product', ['class' => 'btn btn-success']) !!}
    {!! Form::reset('Reset Form', ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
</div>

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="response" class="text-center text-info"></div>
        {!! Form::open(['action' => 'CategoryController@store', 'method' => 'post', 'id' => 'category-form']) !!}
          {!! Form::label('name', 'Category Name') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter category name...']) !!}
          <p class="pt-2">
            <small><i>Reminder: Don't forget to select category after creation!</i></small>
          </p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Create</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  @parent

  <script>
    $(function() {
      // Handle category creation form
      $('#category-form').on('submit', function(event) {
        event.preventDefault();
        $('#response').html('<i class="fa fa-spinner fa-3x fa-spin"></i>');
        $.ajax({
          url: '/category',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: $(this).serialize()
        })
        .done(function(data) {
          $('#response').text(data);
          // Rebuild select
          buildSelect();
        })
        .fail(function(data) {
          $('#response').text('Something went wrong. Category not created.');
        });
      });

      // Function to rebuild select box
      function buildSelect() {
        $.get('/category', function(data) {
          // Reset select box
          var select = $('#category-select');
          select.html('');
          var categories = JSON.parse(data);
          for (var prop in categories) {
            var opt = '<option value="' + prop + '">' + categories[prop] +'</option>';
            select.append(opt);
          }
        });
      }
    });
  </script>
@endsection
