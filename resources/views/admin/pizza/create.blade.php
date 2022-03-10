@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menus') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('admin.pizza.create') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="#" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if($errors)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.pizza.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        <div class="form-group">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <label>Price</label>
                            <div class="col">
                                <input type="number" name="small_price" class="form-control" placeholder="Small Pizza Price" min="1">
                            </div>
                            <div class="col">
                                <input type="number" name="medium_price" class="form-control" placeholder="Medium Pizza Price" min="1">
                            </div>
                            <div class="col">
                                <input type="number" name="large_price" class="form-control" placeholder="Large Pizza Price" min="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category"class="form-control">
                                <option value=""></option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="non-vegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <button class="btn btn-secondary">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
