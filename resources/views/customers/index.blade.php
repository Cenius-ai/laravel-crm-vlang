@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Customers</h1>
        <p class="page-subtitle">{{ $customers->count() }} customer{{ $customers->count() !== 1 ? 's' : '' }} in your CRM</p>
    </div>
    <a href="{{ route('customers.create') }}" class="btn btn--primary btn--lg">
        + New Customer
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th class="col-action"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                <tr>
                    <td>
                        <a href="{{ route('customers.show', $customer) }}" class="row-link">
                            <span class="customer-avatar">{{ strtoupper(substr($customer->name, 0, 2)) }}</span>
                            <span class="customer-name">{{ $customer->name }}</span>
                        </a>
                    </td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->company ?? '—' }}</td>
                    <td class="col-mono">{{ $customer->phone ?? '—' }}</td>
                    <td class="col-action">
                        <a href="{{ route('customers.show', $customer) }}" class="btn btn--ghost btn--sm">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        <p>No customers yet.</p>
                        <a href="{{ route('customers.create') }}" class="btn btn--primary">Add your first customer</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
