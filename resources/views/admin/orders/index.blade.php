@extends('layouts.app')

@section('content')
<div class="container-fluid">


    <!-- Page Title -->
    <div class="d-flex align-items-center mt-2 mb-3">
        <h6 class="mb-0 flex-grow-1">Orders</h6>
        <div class="flex-shrink-0">
            <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm">Add New Order</a>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card">
        <div class="card-body">
                <!-- Success / Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Order Code</th>
                            <th>Priority</th>
                            <th>Duration (min)</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_code }}</td>
                            <td>
                                @if($order->priority == 'urgent')
                                    <span class="badge bg-danger">Urgent</span>
                                @elseif($order->priority == 'standard')
                                    <span class="badge bg-warning">Standard</span>
                                @else
                                    <span class="badge bg-secondary">Low</span>
                                @endif
                            </td>
                            <td>{{ $order->duration }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-secondary">Pending</span>
                                @elseif($order->status == 'assigned')
                                    <span class="badge bg-primary">Assigned</span>
                                @else
                                    <span class="badge bg-success">Delivered</span>
                                @endif
                            </td>
                            <td>{{ $order->assignment?->personnel->name ?? '-' }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <form action="{{ route('assignments.assign', $order->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">Assign</button>
                                    </form>
                                @elseif($order->status == 'assigned' && $order->assignment)
                                    <form action="{{ route('assignments.delivered', $order->assignment->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-success">Mark Delivered</button>
                                    </form>
                                @else
                                    <span class="text-success fw-semibold">Completed</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
