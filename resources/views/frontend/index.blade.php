@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <form action="{{ route('index') }}" method="get">
                            <a href="{{ route('index') }}" class="">Back</a>
                            <input type="submit" value="vegetarian" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="non-vegetarian" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="tradational" name="category" class="list-group-item list-group-item-action">
                        </form>
                        <h1 class="text-center">{{ count($pizzas)}} Pizzas</h1>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizzas') }}</div>

                <div class="card-body">
                    <div class="row">
                        @forelse($pizzas as $pizza)
                        <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc">
                            <img src="{{ Storage::url($pizza->image_url) }}" class="alt-thumbnail" style="width:100%">
                            <p>{{$pizza->name}}</p>
                            <p>{{$pizza->description}}</p>
                            <a href="{{ route('show', $pizza->id) }}" class="btn btn-danger mb-1">Order now</a>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: red;
        color: white;
    }
    .card-header{
        background-color: red;
        color: white;
        font-size: 20px;
    }
</style>
@endsection
