@extends('layouts.master')

@section('content')
<!-- Masthead-->
<header class="masthead text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="{{URL::asset('assets/favicon.png')}}" alt="{{ config('app.name', 'Dady Sell') }}" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ config('app.name', 'Dady Sell') }}</h1>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">free ERP, CRM for life time</p>
    </div>
</header>

<!-- About Section-->
<section class="page-section bg-danger text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead">Businesses looking to automate core business processes typically look at two main software solutions, enterprise resource planning (ERP) and customer relationship management (CRM).</p>
            </div>
            <div class="col-lg-4 ms-auto">
                <p class="lead">ERP helps companies run successful businesses by connecting their financial and operational systems to a central database, while CRM helps manage how customers interact with their businesses.</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead">Both serve as vital data repositories. Both also touch on multiple departments and, while they are sometimes built on the same platform, we helping you here to get them together for free.</p>
            </div>
        </div>
    </div>
</section>
@stop