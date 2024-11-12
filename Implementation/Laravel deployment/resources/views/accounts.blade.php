@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Accounts</h1>
    
    <!-- Tabs for C2B, B2B-->
    <ul class="nav nav-tabs" id="transactionTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="c2b-tab" data-toggle="tab" href="#c2b" role="tab" aria-controls="c2b" aria-selected="true">C2B - Phone Number</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="b2b-tab" data-toggle="tab" href="#b2b" role="tab" aria-controls="b2b" aria-selected="false">C2B - Till Number</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="transactionTabContent">
        <!-- C2B Tab -->
        <div class="tab-pane fade show active" id="c2b" role="tabpanel" aria-labelledby="c2b-tab">
            <form action="{{ route('payments.initiatepush') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="c2b_phone">Phone Number</label>
                    <input type="tel" class="form-control" id="c2b_phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="c2b_amount">Amount</label>
                    <input type="number" class="form-control" id="c2b_amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Pay</button>
            </form>
        </div>

        <div class="tab-pane fade" id="b2b" role="tabpanel" aria-labelledby="b2b-tab">
    <form action="{{ route('payments.b2b') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="b2b_sender_till">Till Number</label>
            <input type="text" class="form-control" id="b2b_sender_till" name="sender_till" required>
        </div>
        <div class="form-group">
            <label for="b2b_amount">Amount</label>
            <input type="number" class="form-control" id="b2b_amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Pay</button>
    </form>
</div>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection