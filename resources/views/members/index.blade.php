@extends('layouts.app')

@section('title', 'Members')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Members</h1>
    <div class="d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('members.create') }}">+ Add Member</a>
        @if(Route::has('members.export'))
        <a class="btn btn-outline-secondary" href="{{ route('members.export') }}">Export CSV</a>
        @endif
    </div>
</div>

<form method="GET" action="{{ route('members.index') }}" class="card card-body mb-3">
    <div class="row g-2">
        <div class="col-md-3">
            <input class="form-control" name="profession" placeholder="Profession"
                value="{{ request('profession') }}">
        </div>
        <div class="col-md-3">
            <input class="form-control" name="company" placeholder="Company"
                value="{{ request('company') }}">
        </div>
        <div class="col-md-3">
            <select class="form-select" name="status">
                <option value="">-- Select Status --</option>
                <option value="active" {{ request('status')==='active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status')==='inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="col-md-3">
            <input class="form-control" name="q" placeholder="Search name or email"
                value="{{ request('q') }}">
        </div>
        <div class="col-12 d-flex gap-2">
            <button class="btn btn-dark">Apply</button>
            <a class="btn btn-outline-secondary" href="{{ route('members.index') }}">Reset</a>
        </div>
    </div>
</form>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profession</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                <tr class="clickable-row"
                    data-href="{{ route('members.show', $member) }}"
                    style="cursor: pointer;">
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->profession }}</td>
                    <td>{{ $member->company }}</td>
                    <td>
                        <span class="badge rounded-pill px-2 py-1 {{ $member->status==='active' ? 'text-bg-success' : 'text-bg-secondary' }}">
                            <small>{{ $member->status }}</small>
                        </span>
                    </td>
                    <td class="d-flex gap-2" onclick="event.stopPropagation();">
                        <a class="btn btn-sm btn-outline-primary"
                            href="{{ route('members.edit', $member) }}">Edit</a>

                        <a class="btn btn-sm btn-outline-secondary"
                            href="{{ route('members.success-stories.index', $member) }}">Stories</a>

                        <form method="POST"
                            action="{{ route('members.destroy', $member) }}"
                            onsubmit="return confirm('Are you sure you want to delete this member?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">No members found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-body">
        {{ $members->appends(request()->query())->links() }}
    </div>
</div>
@endsection