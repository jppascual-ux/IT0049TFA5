@extends('layouts.app')

@section('content')
<section class="page-head">
    <p class="eyebrow">About</p>
    <h1>About SariPOS</h1>
    <p class="lead">
        SariPOS is the course project for IT0049 Web System Technologies. TFA1 built it in
        CodeIgniter 4; this TFA rebuilds the same four pages in Laravel to show that the MVC
        responsibilities stay the same: a <strong>route</strong> picks the controller method,
        the <strong>controller</strong> prepares the data, and a <strong>Blade view</strong>
        renders the page.
    </p>
</section>

<section class="panel">
    <h2 class="section-title">How each page is wired</h2>
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Route name</th>
                    <th>Controller method</th>
                    <th>Blade view</th>
                </tr>
            </thead>
            <tbody>
                <tr><td class="mono">/</td><td class="mono">home</td><td class="mono">PageController@home</td><td class="mono">pages/home.blade.php</td></tr>
                <tr><td class="mono">/about</td><td class="mono">about</td><td class="mono">PageController@about</td><td class="mono">pages/about.blade.php</td></tr>
                <tr><td class="mono">/customers</td><td class="mono">customers.index</td><td class="mono">CustomerController@index</td><td class="mono">customers/index.blade.php</td></tr>
                <tr><td class="mono">/users</td><td class="mono">users.index</td><td class="mono">UserController@index</td><td class="mono">users/index.blade.php</td></tr>
            </tbody>
        </table>
    </div>
</section>

<section class="grid grid--2">
    <div class="card">
        <h3>CodeIgniter 4 &rarr; Laravel</h3>
        <ul class="list">
            <li><span>Routes</span><span class="mono">app/Config/Routes.php &rarr; routes/web.php</span></li>
            <li><span>Controllers</span><span class="mono">app/Controllers &rarr; app/Http/Controllers</span></li>
            <li><span>Views</span><span class="mono">app/Views/*.php &rarr; resources/views/*.blade.php</span></li>
            <li><span>Loops</span><span class="mono">&lt;?php foreach ?&gt; &rarr; @@foreach</span></li>
            <li><span>CLI</span><span class="mono">php spark &rarr; php artisan</span></li>
        </ul>
    </div>
    <div class="card">
        <h3>Developer</h3>
        <ul class="list">
            <li><span>Name</span><span>Jose Luis Pascual</span></li>
            <li><span>Course</span><span>BSIT-BA</span></li>
            <li><span>Section</span><span>TX33</span></li>
            <li><span>Subject</span><span>IT0049 &middot; Web System Technologies</span></li>
            <li><span>Professor</span><span>Doc Mar Eli Sagsagat</span></li>
        </ul>
    </div>
</section>
@endsection
