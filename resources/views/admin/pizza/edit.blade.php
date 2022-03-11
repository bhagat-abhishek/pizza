@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit Pizza') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.pizza.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf()
                        <div class="form-group">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" name="name" value="{{ $pizza->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ $pizza->description }}</textarea>
                        </div>
                        <div class="row">
                            <label>Price</label>
                            <div class="col">
                                <input type="number" name="small_price" class="form-control" placeholder="Small Pizza Price" min="1" value="{{ $pizza->small_price }}">
                            </div>
                            <div class="col">
                                <input type="number" name="medium_price" class="form-control" placeholder="Medium Pizza Price" min="1" value="{{ $pizza->medium_price }}">
                            </div>
                            <div class="col">
                                <input type="number" name="large_price" class="form-control" placeholder="Large Pizza Price" min="1" value="{{ $pizza->large_price }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category"class="form-control">
                                <option value="{{ $pizza->category }}">{{ ucfirst($pizza->category) }}</option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="non-vegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ Storage::url($pizza->image_url) }}" width="80px">
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <a href="{{ route('admin.pizza.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection