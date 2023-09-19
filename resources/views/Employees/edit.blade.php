@extends('layouts.parent')
@section('title', 'Edit Employee')

@section('content')
    @include('components.message')
    <div class="col-12">
        <form action="{{ route('dashboard.employees.update', $Employees->id) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-12 mt-3">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First name"
                           value="{{ old('first_name', $Employees->first_name) }}">
                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last name"
                           value="{{ old('last_name', $Employees->last_name) }}">
                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                           value="{{ old('phone', $Employees->phone) }}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{ old('email', $Employees->email) }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($company as $company)
                            <option value="{{ $company->id }}" {{ old('company_id', $Employees->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
