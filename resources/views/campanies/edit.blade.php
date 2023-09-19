@extends('layouts.parent')
@section('title', 'Edit Company')

@section('content')
    @include('components.message')
    <div class="col-12">
        <form action="{{ route('dashboard.campanies.update', $company->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->
            <div class="form-row">
                <div class="col-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Company name" value="{{ old('name', $company->name) }}">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control" placeholder="Website" value="{{ old('website', $company->website) }}">
                    @error('website')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $company->email) }}">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="image" class="form-control">
                    @error('logo')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
