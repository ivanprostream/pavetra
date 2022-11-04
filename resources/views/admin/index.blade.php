@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('main')

    @include('admin.layouts.welcome-banner')

    <!-- Cards -->
    <div class="grid grid-cols-12 gap-6">


    <!-- Line chart (Acme Plus) -->
    {{-- @include('admin.partials.dashboard-card-01')
    <!-- Line chart (Acme Advanced) -->
    @include('admin.partials.dashboard-card-02')
    <!-- Line chart (Acme Professional) -->
    @include('admin.partials.dashboard-card-03')
    <!-- Bar chart (Direct vs Indirect) -->
    @include('admin.partials.dashboard-card-04')
    <!-- Line chart (Real Time Value) -->
    @include('admin.partials.dashboard-card-05')
    <!-- Doughnut chart (Top Countries) -->
    @include('admin.partials.dashboard-card-06')
    <!-- Table (Top Channels) -->
    @include('admin.partials.dashboard-card-07')
    <!-- Line chart (Sales Over Time) -->
    @include('admin.partials.dashboard-card-08')
    <!-- Stacked bar chart (Sales VS Refunds) -->
    @include('admin.partials.dashboard-card-09')
    <!-- Card (Recent Activity) -->
    @include('admin.partials.dashboard-card-10')
    <!-- Card (Income/Expenses) -->
    @include('admin.partials.dashboard-card-11') --}}

    </div>
@endsection('main')




