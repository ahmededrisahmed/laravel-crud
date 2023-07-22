@extends('layouts.master')

@section('title')
Show Product | {{ $product->name }}
@endsection

@section('content')

    <div class="container">

    	<div class="row">

	        <div class="col-md-12">

	            <div class="card mb-3">

	            	<div class="card-body">

	            		<div class="card-title">
	            			<a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">Back</a>
	            			 <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
	        				<h2 class="mt-2">Show Product | {{ $product->name }}</h2>
    					</div>

    					<div class="row">
    						
	    						<div class="col-6">
	    							<img src="{{ asset($product->image) }}" class="w-100">
	    						</div>

    						<div class="col-6">
	    						<div class="mb-3">Name : {{ $product->name }}</div>
	    						<div class="mb-3">Description : {{ $product->description }}</div>
	    						<div class="mb-3">price : ${{ $product->price }}</div>
	    						<div class="mb-3">Quantity : {{ $product->quantity }}</div>
    						</div>

    					</div>
		            
		            </div>

	            </div>

	        </div>

        </div>

    </div>

@endsection