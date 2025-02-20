<!-- resources/views/customers/index.blade.php -->
@extends('layouts.app')

@section('title', 'Customers')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/customers.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
    </div>

    <div class="card">
        <div class="filters">
            <form action="{{ route('customers.index') }}" method="GET" class="filter-form">
                <div class="search-group">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search by name, email or company..."
                        value="{{ $search ?? '' }}"
                    >
                </div>

                <div class="filter-group">
                    <select name="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="lead" {{ ($status ?? '') == 'lead' ? 'selected' : '' }}>Lead</option>
                        <option value="active" {{ ($status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ ($status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
                @if($search ?? false || $status ?? false)
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->company ?? '-' }}</td>
                        <td>
                            <span class="status-badge status-{{ $customer->status }}">
                                {{ ucfirst($customer->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('customers.show', $customer) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('customers.destroy', $customer) }}"
                                  method="POST"
                                  style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No customers found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
