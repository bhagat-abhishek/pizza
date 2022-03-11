@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Orders') }}</div>

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">User</th>
                        <th scope="col">Phone/Email</th>
                        <th scope="col">Date | Time</th>
                        <th scope="col">Pizza</th>
                        <th scope="col">S. Pizza</th>
                        <th scope="col">M. Pizza</th>
                        <th scope="col">L. Pizza</th>
                        <th scope="col">Total</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Reject</th>
                        <th scope="col">Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->user->name }}</th>
                                <td>{{ $order->phone }} / {{ $order->user->email }}</td>
                                <td>{{ $order->date }} | {{ $order->time }}</td>
                                <td>{{ $order->pizza->name }}</td>
                                <td>{{ $order->small_pizza }}</td>
                                <td>{{ $order->medium_pizza }}</td>
                                <td>{{ $order->large_pizza }}</td>
                                <td>${{ ($order->pizza->small_price * $order->small_pizza) + ($order->pizza->medium_price * $order->medium_pizza) + ($order->pizza->large_price * $order->large_pizza) }}</td>
                                <td>{{ $order->body }}</td>
                                <td>{{ $order->status }}</td>
                                <form action="{{ route('admin.order.status', $order->id)}}" method="POST">@csrf
                                    <td>
                                        <input name="status" type="submit" value="accepted" class="btn btn-success btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="rejected" class="btn btn-danger btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="completed" class="btn btn-primary btn-sm">
                                    </td>
                                </form>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="12">No Orders Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection