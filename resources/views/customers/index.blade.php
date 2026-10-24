@extends('layouts.app')

@section('content')
<section class="page-head">
    <p class="eyebrow">Accounts</p>
    <h1>Customer Accounts</h1>
    <p class="lead">Registered customers of the store. Data source: static PHP array in <code>CustomerController</code>.</p>
</section>

<section class="stats">
    <div class="stat"><span class="stat__label">Total customers</span><span class="stat__value">{{ count($customers) }}</span></div>
    <div class="stat"><span class="stat__label">Active</span><span class="stat__value">{{ $activeCount }}</span></div>
    <div class="stat"><span class="stat__label">Loyalty points issued</span><span class="stat__value">{{ number_format($totalPoints) }}</span></div>
</section>

<section class="panel">
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th class="num">Points</th>
                    <th>Joined</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td class="mono">{{ $customer['customer_code'] }}</td>
                        <td>
                            <div class="person">
                                <span class="avatar">{{ collect(explode(' ', $customer['name']))->map(fn ($p) => $p[0])->take(2)->implode('') }}</span>
                                <div>
                                    <strong>{{ $customer['name'] }}</strong>
                                    <small>{{ $customer['email'] }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="mono nowrap">{{ $customer['phone'] }}</td>
                        <td>{{ $customer['city'] }}</td>
                        <td class="mono num">{{ number_format($customer['loyalty_points']) }}</td>
                        <td class="nowrap">{{ \Illuminate\Support\Carbon::parse($customer['joined_at'])->format('M d, Y') }}</td>
                        <td><span class="badge badge--{{ strtolower($customer['status']) }}">{{ $customer['status'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
