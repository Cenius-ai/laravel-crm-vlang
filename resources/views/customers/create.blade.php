@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <a href="{{ route('customers.index') }}" class="back-link">← Back to Customers</a>
        <h1 class="page-title">Add Customer</h1>
        <p class="page-subtitle">Create a new customer record</p>
    </div>
</div>

<div class="card card--form">
    <form action="{{ route('customers.store') }}" method="POST" class="customer-form" id="create-customer-form">
        @csrf

        <div class="form-grid">
            <div class="form-field">
                <label for="name" class="form-label">Full Name <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-input @error('name') form-input--error @enderror"
                    value="{{ old('name') }}"
                    required
                    maxlength="255"
                    placeholder="e.g. Jane Smith"
                    autofocus
                >
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input @error('email') form-input--error @enderror"
                    value="{{ old('email') }}"
                    required
                    maxlength="255"
                    placeholder="e.g. jane@company.com"
                >
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="company" class="form-label">Company</label>
                <input
                    type="text"
                    id="company"
                    name="company"
                    class="form-input @error('company') form-input--error @enderror"
                    value="{{ old('company') }}"
                    maxlength="255"
                    placeholder="e.g. Acme Corp"
                >
                @error('company')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="phone" class="form-label">Phone</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    class="form-input @error('phone') form-input--error @enderror"
                    value="{{ old('phone') }}"
                    maxlength="30"
                    placeholder="e.g. (555) 123-4567"
                >
                @error('phone')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field form-field--full">
                <label for="notes" class="form-label">Notes</label>
                <textarea
                    id="notes"
                    name="notes"
                    class="form-input form-textarea @error('notes') form-input--error @enderror"
                    rows="5"
                    maxlength="5000"
                    placeholder="Any relevant notes about this customer…"
                >{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('customers.index') }}" class="btn btn--ghost">Cancel</a>
            <button type="submit" class="btn btn--primary btn--lg">Save Customer</button>
        </div>
    </form>
</div>
@endsection
