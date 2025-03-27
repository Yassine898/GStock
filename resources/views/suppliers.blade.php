@extends('layouts.app')

@section('content')


@if (count($suppliers)>0)
@foreach ($suppliers as $supplier)
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="card-title mb-4">Name: {{ $supplier->first_name }} {{ $supplier->last_name }}</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Email:</strong> {{ $supplier->email }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $supplier->phone }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $supplier->address }}</li>
        </ul>
    </div>
</div>

@endforeach
@endif
@endsection
