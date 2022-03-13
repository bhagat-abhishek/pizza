@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Customers   ') }}</div>

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined on</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <th scope="row">{{ $customer->name }}</th>
                                <td>{{ $customer->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->diffForHumans() }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="12">No Customers Found</td>
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