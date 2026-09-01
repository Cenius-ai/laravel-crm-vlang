@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <a href="{{ route('customers.index') }}" class="back-link">← Back to Customers</a>
        <h1 class="page-title">{{ $customer->name }}</h1>
        <p class="page-subtitle">Customer since {{ $customer->created_at->format('F j, Y') }}</p>
    </div>
    <a href="{{ route('customers.create') }}" class="btn btn--primary">
        + New Customer
    </a>
</div>

<div class="detail-grid">
    <div class="card">
        <h2 class="card-title">Contact Information</h2>
        <dl class="detail-list">
            <div class="detail-row">
                <dt>Email</dt>
                <dd><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></dd>
            </div>
            <div class="detail-row">
                <dt>Phone</dt>
                <dd class="col-mono">{{ $customer->phone ?? '—' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Company</dt>
                <dd>{{ $customer->company ?? '—' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Customer ID</dt>
                <dd class="col-mono">#{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</dd>
            </div>
        </dl>
    </div>

    <div class="card">
        <h2 class="card-title">Notes</h2>
        @if ($customer->notes)
            <div class="notes-content">
                {{ $customer->notes }}
            </div>
        @else
            <p class="text-muted">No notes recorded for this customer.</p>
        @endif
    </div>
</div>
@endsection
