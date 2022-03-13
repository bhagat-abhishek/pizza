@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                @if(Auth::check())
                    <form action="{{ route('order.store') }}" method="post">@csrf
                        <div class="form-group">
                            <p>Name: {{auth()->user()->name}}</p>
                            <p>Name: {{auth()->user()->email}}</p>
                            <p>Phone Number: <input type="number" name="phone" class="form-control" required></p>
                            <p>Nos of Small Pizzas: <input type="number" name="small_pizza" class="form-control" value="0" min="0"></p>
                            <p>Nos of Medium Pizzas: <input type="number" name="medium_pizza" class="form-control" value="0" min="0"></p>
                            <p>Nos of Large Pizzas: <input type="number" name="large_pizza" class="form-control" value="0" min="0"></p>
                            <p><input type="hidden" name="pizza_id" value="{{$pizza->id}}"></p>
                            <p>Date: <input type="date" name="date" class="form-control" required></p>
                            <p>Time: <input type="time" name="time" class="form-control" required></p>
                            <p>Message: <textarea name="body" class="form-control" ></textarea></p>
                            <p class="text-center">
                                <button type="submit" class="btn btn-danger">Make Order</button>
                            </p>
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </form>
                @else
                <p><a href="{{ route('login') }}">Please login to make order</a></p>
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizzas') }}</div>

                <div class="card-body">
                        <img src="{{ Storage::url($pizza->image_url) }}" class="alt-thumbnail" style="width:100%">
                        <p><h3>{{$pizza->name}}</h3></p>
                        <p><h3>{{$pizza->description}}</h3></p>
                        <p>Small Pizza Size: ${{$pizza->small_price}}</p>
                        <p>Medium Pizza Size: ${{$pizza->medium_price}}</p>
                        <p>Large Pizza Size: ${{$pizza->large_price}}</p>
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
