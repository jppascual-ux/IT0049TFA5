@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero__text">
        <p class="eyebrow">Point-of-Sale System &middot; Laravel Edition</p>
        <h1>Run the counter, know your <span class="hl">suki</span>, manage your staff.</h1>
        <p class="lead">
            SariPOS is a simple point-of-sale system for neighborhood stores.
            This build rebuilds the TFA1 CodeIgniter app in Laravel using routes,
            controllers, and Blade views.
        </p>
        <div class="hero__actions">
            <a href="{{ route('customers.index') }}" class="btn btn--primary">View Customer Accounts</a>
            <a href="{{ route('users.index') }}" class="btn btn--ghost">View User Accounts</a>
        </div>
    </div>

    <aside class="receipt" aria-label="Sample receipt">
        <div class="receipt__head">
            <strong>SARIPOS STORE</strong>
            <span>OR# 000128 &middot; Counter 1</span>
        </div>
        <ul class="receipt__lines">
            <li><span>Pancit Canton x3</span><span>45.00</span></li>
            <li><span>Kopiko Brown x2</span><span>20.00</span></li>
            <li><span>Pandesal x10</span><span>50.00</span></li>
            <li><span>Coke Mismo x1</span><span>20.00</span></li>
        </ul>
        <div class="receipt__total"><span>TOTAL</span><span>&#8369;135.00</span></div>
        <p class="receipt__foot">Salamat po! Balik kayo.</p>
    </aside>
</section>

<section class="modules">
    <h2 class="section-title">Modules</h2>
    <div class="grid">
        <a href="{{ route('customers.index') }}" class="card card--link">
            <span class="tag tag--live">Live</span>
            <h3>Customer Accounts</h3>
            <p>Registered customers, contact details, and loyalty points.</p>
        </a>
        <a href="{{ route('users.index') }}" class="card card--link">
            <span class="tag tag--live">Live</span>
            <h3>User Accounts</h3>
            <p>Cashiers, managers, and admins who can sign in to the POS.</p>
        </a>
        <div class="card card--muted">
            <span class="tag">Coming soon</span>
            <h3>Sales &amp; Checkout</h3>
            <p>Ring up items, compute change, and print receipts.</p>
        </div>
        <div class="card card--muted">
            <span class="tag">Coming soon</span>
            <h3>Inventory</h3>
            <p>Track stock levels and get alerts for low inventory.</p>
        </div>
    </div>
</section>
@endsection
