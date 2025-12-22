@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="d-flex align-items-center mt-2 mb-3">
        <h6 class="mb-0 flex-grow-1">Order Assignments</h6>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order Code</th>
                        <th>Priority</th>
                        <th>Assigned To</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Assigned At</th>
                        <th>Delivered At</th>
                        <th>Expected Delivery</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($assignments as $key => $assignment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $assignment->order->order_code }}</td>

                        <td>
                            <span class="badge 
                                {{ $assignment->order->priority == 'urgent' ? 'bg-danger' : 'bg-warning' }}">
                                {{ ucfirst($assignment->order->priority) }}
                            </span>
                        </td>

                        <td>{{ $assignment->personnel->name }}</td>
                        <td>{{ $assignment->order->duration }} min</td>

                        <td>
                            @if($assignment->order->status === 'assigned')
                                <span class="badge bg-primary">Assigned</span>
                            @elseif($assignment->order->status === 'delivered')
                                <span class="badge bg-success">Delivered</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>

                        <td>
                            {{ $assignment->assigned_at 
                                ? $assignment->assigned_at->format('d-m-Y h:i A') 
                                : '-' }}
                        </td>

                        <td>
                            {{ $assignment->delivered_at 
                                ? $assignment->delivered_at->format('d-m-Y h:i A') 
                                : '-' }}
                        </td>

                        <td>
                            {{ $assignment->expected_delivery_at
                                ? \Carbon\Carbon::parse($assignment->expected_delivery_at)
                                    ->format('d-m-Y H:i')
                                : '-' }}
                        </td>

                        <td>
                            @if(!$assignment->delivered_at)
                                <form method="POST"
                                      action="{{ route('assignments.delivered', $assignment->id) }}">
                                    @csrf
                                    <!-- POST method is enough for delivery -->
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Mark Delivered
                                    </button>
                                </form>
                            @else
                                <span class="text-success fw-semibold">Completed</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            No assignments found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
