@extends('layouts.app')

@section('title', 'Prediction')

@section('content')
    <div class="container">
        <h3>Prediction Results</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Predicted Grades</h4>
                    </div>
                    <div class="card-body">
                        <p>Predicted Grade: {{ $predictions['grade_prediction'] }}</p>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Predicted Finances</h4>
                    </div>
                    <div class="card-body">
                        <p>Predicted Finance: KSh {{ number_format($predictions['finance_prediction']) }}</p>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Predicted Number of Student Entries</h4>
                    </div>
                    <div class="card-body">
                        <p>Predicted Student Entries: {{ $predictions['student_entry_prediction'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
