
@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    Confirm Delete Customer
                </div>
                <div class="card-body">
                    <p class="mb-3">
                        Are you sure you want to delete this customer?
                    </p>
                    <form action="/customer/{{ $id }}/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-danger">
                                Confirm Delete
                            </button>
                            <a class='btn btn-secondary' href="/clients">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection