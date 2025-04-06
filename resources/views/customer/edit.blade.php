@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add New Customer
                </div>
                <div class="card-body">
                    <form action="/customer/{{ $customer->id }}/edit" method="post">  <!-- Replace '#' with your actual form submission URL -->
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" value="{{$customer->first_name??$customer->first_name:: old('firstName') }}" required>
                            @error('firstName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{$customer->last_name??$customer->last_name :: old('lastName') }}" placeholder="Enter last name" required>
                            @error('lastName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email ?? $customer->email :: old(key: 'email') }}" placeholder="Enter email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $customer->phone ?? $customer->phone::old('phone') }}" placeholder="Enter phone number" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address"  rows="3" placeholder="Enter address" required>{{$customer->address ?? $customer->address :: old('address') }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a href="#" class="btn btn-secondary">Cancel</a> <!-- Replace '#' with your cancel URL -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection