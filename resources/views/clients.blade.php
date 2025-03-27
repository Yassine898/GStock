@extends('layouts.app')

@section('content')

@if (count($customers)>0)
@foreach ($customers as $customer)
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="card-title mb-4">Name: {{ $customer->first_name }} {{ $customer->last_name }}</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $customer->phone }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $customer->address }}</li>
        </ul>
    </div>
</div>

@endforeach
@endif

@endsection
