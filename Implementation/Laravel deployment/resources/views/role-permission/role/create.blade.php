<!-- resources/views/role-permission/role/index.blade.php -->
@extends('layouts.app-web-layout')

@section('title', 'Roles')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Create Role</h4>
                    <a href="{{ url('roles') }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles') }}" method="POST">
                        @csrf
                    <div class="mb-3">
                        <label for="">Role Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
