@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('All pizzas') }}
                    <a href="{{ route('admin.pizza.create') }}" class="btn btn-success" style="float: right;">Add Pizza</a>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Small P.</th>
                            <th scope="col">Medium P.</th>
                            <th scope="col">Large P.</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pizzas as $key=> $pizza)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><img src="{{ Storage::url($pizza->image_url) }}" width="80px"></td>
                                    <td>{{  $pizza->name }}</td>
                                    <td>{{  $pizza->description }}</td>
                                    <td>{{  $pizza->category }}</td>
                                    <td>{{  $pizza->small_price }}</td>
                                    <td>{{  $pizza->medium_price }}</td>
                                    <td>{{  $pizza->large_price }}</td>
                                    <td>
                                        <a href="{{ route('admin.pizza.edit', $pizza->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.pizza.destroy', $pizza->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="9">No pizzas found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pizzas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
