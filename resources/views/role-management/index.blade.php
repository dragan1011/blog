@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage User Roles</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
      <!--   <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('role-management.update', $user) }}" method="POST">
                            @csrf
                            <select name="role" class="form-select">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Update Role</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody> -->
    </table>
</div>
@endsection
