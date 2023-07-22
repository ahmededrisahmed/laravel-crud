@extends('layouts.master')

@section('title')
Create Product
@endsection

@section('content')

    <div class="container">

    	<div class="row">

	        <div class="col-md-12">

	            <div class="card mb-3">

	            	<div class="card-body">

	            		<div class="card-title">
	            			<a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
	        				<h2 class="mt-2">Create Product</h2>
    					</div>
    					@include('layouts.message')
		            
		                <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
		                    @csrf
		                    @method('post')

		                    {{--name--}}
		                    <div class="form-group">
		                        <label>Name<span class="text-danger">*</span></label>
		                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
		                    </div>

		                    {{--quantity--}}
		                    <div class="form-group">
		                        <label>Quantity<span class="text-danger">*</span></label>
		                        <input type="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
		                    </div>

		                    {{--price--}}
		                    <div class="form-group">
		                        <label>Price<span class="text-danger">*</span></label>
		                        <input type="number" min="1" name="price" class="form-control" value="{{ old('price') }}" required>
		                    </div>

		                    {{--description--}}
		                    <div class="form-group">
		                        <label>Description<span class="text-danger">*</span></label>
		                        <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
		                    </div>

		                    {{--image--}}
		                    <div class="form-group">
		                        <label>Image<span class="text-danger">*</span></label>
		                        <input type="file" name="image" class="form-control" value="{{ old('image') }}" >
		                    </div>

		                    <div class="form-group mt-4">
		                        <button type="submit" class="btn btn-primary"> Create</button>
		                    </div>

		                </form>
		            
		            </div>

	            </div>

	        </div>

        </div>

    </div>

@endsection