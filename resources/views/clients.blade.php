@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-success" onclick="window.location.href='/customer/Add'">
            Add New Customer
        </button>
        <div id="customer-count" class="text-muted">
          Total Customers: {{ count($customers) }}
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (count($customers) > 0)
        <div class="row">
            @foreach ($customers as $customer)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $customer->first_name }} {{ $customer->last_name }}
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Email:</strong> {{ $customer->email }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Phone:</strong> {{ $customer->phone }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Address:</strong> {{ $customer->address }}
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="/customer/edit/{{ $customer->id }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="/customer/delete/{{ $customer->id }}" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" role="alert">
            No customers found.
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

@endsection