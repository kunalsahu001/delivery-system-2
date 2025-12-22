@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="d-flex align-items-center mb-3">
        <h5 class="mb-0 mt-2 flex-grow-1">Dashboard</h5>
    </div>

    <!-- Welcome -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="mb-1">
                Welcome, <span class="fw-semibold">{{ Auth::user()->name }}</span> 👋
            </h4>
            <p class="text-muted mb-0">
                Smart Delivery Assignment System – Admin Panel
            </p>
        </div>
    </div>

    <!-- Counts -->
    <div class="row">

        <!-- Total Orders -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="text-muted">Total Orders</h6>
                    <h2 class="fw-bold">{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>

        <!-- Urgent Orders -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="text-muted">Urgent Orders</h6>
                    <h2 class="fw-bold text-danger">{{ $urgentOrders }}</h2>
                </div>
            </div>
        </div>

        <!-- Assigned Orders -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="text-muted">Assigned Orders</h6>
                    <h2 class="fw-bold text-success">{{ $assignedOrders }}</h2>
                </div>
            </div>
        </div>

        <!-- Available Delivery Personnel -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="text-muted">Available Personnel</h6>
                    <h2 class="fw-bold text-primary">{{ $availablePersonnel }}</h2>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
