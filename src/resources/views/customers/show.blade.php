<!-- resources/views/customers/show.blade.php -->
@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
    <div class="page-header">
        <h1>Customer Details</h1>
        <div class="button-group">
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">Edit Customer</a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <div class="card">
        <div class="customer-info">
            <div class="info-group">
                <label>Name</label>
                <div class="info-value">{{ $customer->name }}</div>
            </div>

            <div class="info-group">
                <label>Email</label>
                <div class="info-value">{{ $customer->email }}</div>
            </div>

            <div class="info-group">
                <label>Phone</label>
                <div class="info-value">{{ $customer->phone ?? 'Not provided' }}</div>
            </div>

            <div class="info-group">
                <label>Company</label>
                <div class="info-value">{{ $customer->company ?? 'Not provided' }}</div>
            </div>

            <div class="info-group">
                <label>Status</label>
                <div class="info-value">
                    <span class="status-badge status-{{ $customer->status }}">
                        {{ ucfirst($customer->status) }}
                    </span>
                </div>
            </div>

            <div class="info-group">
                <label>Created At</label>
                <div class="info-value">{{ $customer->created_at->format('F j, Y g:i A') }}</div>
            </div>

            <div class="info-group">
                <label>Last Updated</label>
                <div class="info-value">{{ $customer->updated_at->format('F j, Y g:i A') }}</div>
            </div>
        </div>

        <div class="danger-zone">
            <h3>Danger Zone</h3>
            <form action="{{ route('customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Customer</button>
            </form>
        </div>
    </div>
@endsection
