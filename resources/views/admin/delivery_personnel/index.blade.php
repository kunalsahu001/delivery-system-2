@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center mt-2 mb-3">
        <h6 class="mb-0 flex-grow-1">Delivery Personnel</h6>
       
    </div>

    {{-- Success / Error Messages --}}
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
                        <th>Name</th>
                        <th>Skill Level</th>
                        <th>Max Orders</th>
                        <th>Current Orders</th>
                        <th>Last Assigned At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($personnel as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $p->name }}</td>
                            <td>
                                <span class="badge 
                                    {{ $p->skill_level == 'expert' ? 'bg-danger' : ($p->skill_level == 'intermediate' ? 'bg-warning' : 'bg-secondary') }}">
                                    {{ ucfirst($p->skill_level) }}
                                </span>
                            </td>
                            <td>{{ $p->max_orders }}</td>
                            <td>{{ $p->current_orders }}</td>
                            <td>{{ $p->last_assigned_at ? $p->last_assigned_at->format('d-m-Y H:i') : '-' }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No delivery personnel found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
