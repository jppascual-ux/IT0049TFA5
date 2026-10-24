@extends('layouts.app')

@section('content')
<section class="page-head">
    <p class="eyebrow">Accounts</p>
    <h1>User Accounts</h1>
    <p class="lead">Staff who can sign in to the POS. Data source: static PHP array in <code>UserController</code>.</p>
</section>

<section class="stats">
    <div class="stat"><span class="stat__label">Total users</span><span class="stat__value">{{ count($users) }}</span></div>
    <div class="stat"><span class="stat__label">Active</span><span class="stat__value">{{ $activeCount }}</span></div>
    <div class="stat"><span class="stat__label">Roles</span><span class="stat__value">{{ $roleCount }}</span></div>
</section>

<section class="panel">
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Last login</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td>
                            <div class="person">
                                <span class="avatar avatar--alt">{{ collect(explode(' ', $user['name']))->map(fn ($p) => $p[0])->take(2)->implode('') }}</span>
                                <div>
                                    <strong>{{ $user['name'] }}</strong>
                                    <small>{{ $user['email'] }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="mono">{{ '@' . $user['username'] }}</td>
                        <td><span class="role">{{ $user['role'] }}</span></td>
                        <td class="nowrap">{{ \Illuminate\Support\Carbon::parse($user['last_login'])->format('M d, Y · g:i A') }}</td>
                        <td><span class="badge badge--{{ strtolower($user['status']) }}">{{ $user['status'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
