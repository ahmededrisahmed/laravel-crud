@extends('layouts.master')

@section('title')
Products
@endsection

@section('content')

    <div class="container">
    	
    	<div class="row">

	        <div class="col-md-12">
	        	
	        	<div>
	        		<a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Create Product</a>
	        	</div>

	        	@include('layouts.message')

                <div class="table-responsive">

                	@if(count($products) > 0)
	                    <table class="table datatable" id="products-table" style="width: 100%;">
	                        <thead>
	                        <tr>
	                            <th>
	                                #
	                            </th>
	                            <th>Name</th>
	                            <th>Price</th>
	                            <th>Quantity</th>
	                            <th>Description</th>
	                            <th>Image</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>
	                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td><img src="{{ asset($product->image) }}" width="120px"></td>
                                    <td>
                                    	<a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm">
                                        	Show
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                        	Edit
                                        </a>

                                        <button class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal{{ $product->id }}">Delete</button>
                                        
                                    </td>
                                </tr>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Delete Product | {{ $product->name }}</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        Are you sure to delete {{ $product->name }} product...
								      </div>
								      <div class="modal-footer">
								      	
								      	<form action="{{ route('products.destroy', $product->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal{{ $product->id }}">Delete</button>
                                        </form>

								      </div>
								    </div>
								  </div>
								</div>
								
                            @endforeach
                            {{ $products->links() }}
                        	</tbody>
                    	</table>
                    	@else
                    	<div class="alert alert-danger">No data to show</div>
                    @endif
                </div>


	        </div>

	    </div>

	</div>

@endsection


@section('js')
@endsection
