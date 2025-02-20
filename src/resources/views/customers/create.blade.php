<!-- resources/views/customers/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Customer')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/customers.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h1>Add New Customer</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="card">
        <form action="{{ route('customers.store') }}" method="POST" class="customer-form">
            @csrf

            <div class="form-section">
                <div class="form-group">
                    <label class="form-label">
                        Name <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Email <span class="required">*</span>
                    </label>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input
                        type="tel"
                        name="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}"
                        placeholder="e.g., +1 (555) 123-4567"
                    >
                    @error('phone')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Company</label>
                    <input
                        type="text"
                        name="company"
                        class="form-control @error('company') is-invalid @enderror"
                        value="{{ old('company') }}"
                    >
                    @error('company')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Status <span class="required">*</span>
                    </label>
                    <select
                        name="status"
                        class="form-control @error('status') is-invalid @enderror"
                    >
                        <option value="">Select Status</option>
                        <option value="lead" {{ old('status') == 'lead' ? 'selected' : '' }}>
                            Lead
                        </option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                    @error('status')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Customer</button>
            </div>
        </form>
    </div>
@endsection
