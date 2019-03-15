@extends('layouts.app')

@section('content')

<div class="container">
<form class="save_form" method="post" action="{{url('save_product')}}">
  
    @if(session('message'))
    <div class="alert alert-success" role="alert">
	  {{session('message')}}
	</div>
	@endif

  <fieldset>
       {{csrf_field()}}
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
      
    </div>
	
	
	
	<div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      
	  <textarea id="article-ckeditor" name="description"></textarea>
      
    </div>
	
	<div class="form-group">
	
	<div id="img-previews"></div>
	
	</div>
	
	<div class="form-group">
      <label class="btn btn-primary">Product Image
      <input type="file" class="product_image" name="product_image">
	  </label>
      
    </div>
	
	<div class="form-group">
      <label for="exampleInputEmail1" class="">Price 
      <input type="number" class="form-control price_field" name="price">
	  </label>
      
    </div>
    
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>

</div>

<script src="{{url('public/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

@stop