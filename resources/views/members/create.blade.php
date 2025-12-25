@extends('layouts.app')

@section('title', 'Add Member')

@section('content')
<h1 class="h3 mb-3">Add Member</h1>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the errors below.</strong>
        </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-md-6">
                <label class="form-label">Name *</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name') }}" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control"
                    value="{{ old('email') }}" required>
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Profession *</label>
                <input type="text" name="profession" class="form-control"
                    value="{{ old('profession') }}" required>
                @error('profession') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Company</label>
                <input type="text" name="company" class="form-control"
                    value="{{ old('company') }}">
                @error('company') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-8">
                <label class="form-label">LinkedIn URL</label>
                <input type="url" name="linkedin_url" class="form-control"
                    value="{{ old('linkedin_url') }}">
                @error('linkedin_url') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" {{ old('status','active')==='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status')==='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection