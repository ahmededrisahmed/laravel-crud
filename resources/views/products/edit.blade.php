@extends('layouts.master')

@section('title')
Edit Product | {{ $product->name }}
@endsection

@section('content')

    <div class="container">

    	<div class="row">

	        <div class="col-md-12">

	            <div class="card mb-3">

	            	<div class="card-body">

	            		<div class="card-title">
	        				<h2 class="mt-2">Edit Product | {{ $product->name }}</h2>
    					</div>

    					 <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
		                    @csrf
		                    @method('put')

		                    @include('layouts.message')

		                    {{--name--}}
		                    <div class="form-group">
		                        <label>Name<span class="text-danger">*</span></label>
		                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required autofocus>
		                    </div>

		                    {{--quantity--}}
		                    <div class="form-group">
		                        <label>Quantity<span class="text-danger">*</span></label>
		                        <input type="quantity" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
		                    </div>

		                    {{--price--}}
		                    <div class="form-group">
		                        <label>Price<span class="text-danger">*</span></label>
		                        <input type="number" min="1" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
		                    </div>

		                    {{--description--}}
		                    <div class="form-group">
		                        <label>Description<span class="text-danger">*</span></label>
		                        <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
		                    </div>

		                    {{--image--}}
		                    <div class="form-group">
		                        <label>Image<span class="text-danger">*</span></label>
		                        <input type="file" name="image" class="form-control" value="{{ old('image', $product->image) }}">
		                        <img src="{{ asset($product->image) }}" class="mt-3" width="100" height="120">
		                    </div>

		                    <div class="form-group">
		                        <button type="submit" class="btn btn-primary">Update</button>
		                    </div>

		                </form>

		            </div>

		        </div>

		    </div>

		</div>

	</div>

@endsection

