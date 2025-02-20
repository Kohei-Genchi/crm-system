<!-- resources/views/customers/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
    <div class="page-header">
        <h1>Edit Customer: {{ $customer->name }}</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card">
        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">
                    Name <span class="required">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $customer->name) }}"
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
                    value="{{ old('email', $customer->email) }}"
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
                    value="{{ old('phone', $customer->phone) }}"
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
                    value="{{ old('company', $customer->company) }}"
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
                    <option value="lead" {{ old('status', $customer->status) == 'lead' ? 'selected' : '' }}>
                        Lead
                    </option>
                    <option value="active" {{ old('status', $customer->status) == 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="inactive" {{ old('status', $customer->status) == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
                @error('status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </div>
        </form>
    </div>
@endsection
