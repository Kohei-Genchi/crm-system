
@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h1>Dashboard</h1>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">Total Customers</div>
            <div class="stat-value">{{ $stats['total_customers'] }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Active Customers</div>
            <div class="stat-value">{{ $stats['active_customers'] }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Current Leads</div>
            <div class="stat-value">{{ $stats['leads'] }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Inactive Customers</div>
            <div class="stat-value">{{ $stats['inactive_customers'] }}</div>
        </div>
    </div>

    <div class="card mt-6">
        <h2>Recent Customers</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Added</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['recent_customers'] as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <span class="status-badge status-{{ $customer->status }}">
                                {{ ucfirst($customer->status) }}
                            </span>
                        </td>
                        <td>{{ $customer->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
