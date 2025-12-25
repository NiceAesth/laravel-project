@extends('layouts.app')

@section('title', 'Member Details')

@section('content')
<h1 class="h3 mb-3">Member Details</h1>

<div class="card">
    <div class="card-body">
        <p><strong>Name:</strong> {{ $member->name }}</p>
        <p><strong>Email:</strong> {{ $member->email }}</p>
        <p><strong>Profession:</strong> {{ $member->profession }}</p>
        <p><strong>Company:</strong> {{ $member->company }}</p>
        <p><strong>LinkedIn:</strong>
            @if($member->linkedin_url)
            <a href="{{ $member->linkedin_url }}" target="_blank">{{ $member->linkedin_url }}</a>
            @else
            -
            @endif
        </p>
        <p><strong>Status:</strong> {{ $member->status }}</p>

        <div class="d-flex gap-2">
            <a class="btn btn-outline-primary" href="{{ route('members.edit', $member->id) }}">Edit</a>
            <a class="btn btn-outline-secondary" href="{{ route('members.index') }}">Back</a>
        </div>
    </div>
</div>
@endsection