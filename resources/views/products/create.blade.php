@extends('layouts.app')

@section('content')

<div class="container bg-white p-3">
  <h1>Create New Product</h1>
  {!! Form::open(['action' => 'ProductsController@store', 'method' => 'post']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Product Name'); !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter product name...']); !!}
    </div>
    <div class="form-group">
      {!! Form::label('description', 'Description') !!}
      {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Enter product description...']) !!}
    </div>
    <div class="form-group col-6 p-0">
      {!! Form::label('category', 'Category') !!}
      {!! Form::select('category', $categories, null, ['class' => 'form-control', 'id' => 'categories']) !!}
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">New Category</button>
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
          buildSelect();
        });
      });

      // Function to rebuild select box
      function buildSelect() {
        $.get('/category', function(data) {
          console.log(data);
        });
      }
    });
  </script>
@endsection
