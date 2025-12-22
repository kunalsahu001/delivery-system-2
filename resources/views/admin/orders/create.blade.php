@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="d-flex align-items-center mt-2 mb-3">
        <h6 class="mb-0 flex-grow-1">Add New Order</h6>
        <div class="flex-shrink-0">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm">Back to Orders</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <!-- Order Form -->
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <!-- Order Code -->
                <div class="mb-3">
                    <label for="order_code" class="form-label">Order Code <span class="text-danger">*</span></label>
                    <input type="text" name="order_code" id="order_code" 
                           class="form-control @error('order_code') is-invalid @enderror" 
                           value="{{ old('order_code') }}" placeholder="Enter order code">
                    @error('order_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Priority -->
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority <span class="text-danger">*</span></label>
                    <select name="priority" id="priority" 
                            class="form-select @error('priority') is-invalid @enderror">
                        <option value="">Select Priority</option>
                        <option value="urgent" {{ old('priority')=='urgent' ? 'selected' : '' }}>Urgent</option>
                        <option value="standard" {{ old('priority')=='standard' ? 'selected' : '' }}>Standard</option>
                        <option value="low" {{ old('priority')=='low' ? 'selected' : '' }}>Low</option>
                    </select>
                    @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Duration -->
                <div class="mb-3">
                    <label for="duration" class="form-label">Delivery Duration (Minutes) <span class="text-danger">*</span></label>
                    <select name="duration" id="duration" 
                            class="form-select @error('duration') is-invalid @enderror">
                        <option value="">Select Duration</option>
                        <option value="15" {{ old('duration')=='15' ? 'selected' : '' }}>15</option>
                        <option value="30" {{ old('duration')=='30' ? 'selected' : '' }}>30</option>
                        <option value="60" {{ old('duration')=='60' ? 'selected' : '' }}>60</option>
                    </select>
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Order</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
