@extends('layouts.app')

@section('content')

<div class="container">

@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif	

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr> 
  </thead>
  <tbody>
    <?php $i = 1;   ?>
    @foreach($products as $product)
    <tr class="table-active">
      <th scope="row">{{ $i }}</th>
      <td>image</td>
      <td>{{$product->title}}</td>
      <td><?php echo $product->description; ?></td>
	  <td>price</td>
      <td><a href="{{url('edit_product')}}/{{$product->id}}" class="btn btn-info edit_button">Edit</a> | 
	  
	  <form class="delete_form" action ="{{url('delete_product')}}/{{$product->id}}" method="get">
			
	  <button type="submit" name="delete_product" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><span class="fa fa-times"></span>Delete</button>
	  
	  </form>
	  

    </tr>
	<?php $i++; ?>
	@endforeach
	
   
  </tbody>
</table>

 <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Are you sure you want to delete?</h4>
        </div>
		
       
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
		  <button type="button" data-dismiss="modal" class="btn">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>


</div>
@stop