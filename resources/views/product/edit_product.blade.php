@extends('layouts.app')

@section('content')

<div class="container">
<form class="save_form" method="post" action="{{url('update_product',array($product->id))}}">
  
    @if(session('message'))
    <div class="alert alert-success" role="alert">
	  {{session('message')}}
	</div>
	@endif

  <fieldset>
       {{csrf_field()}}
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" aria-describedby="emailHelp" value="{{$product->title}}" placeholder="Enter Title">
      
    </div>
	
	<div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      
	  <textarea id="article-ckeditor" name="description">{{$product->description}}</textarea>
      
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