@extends('layouts.parent')
@section('title','Add Company')

@section('content')
  @include('components.message')
    <div class="col-12">
        <form action="{{route('dashboard.campanies.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-12 mt-3" >
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" placeholder="company name">
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="website">website</label>
                    <input type="text" name="website" class="form-control" placeholder="website">
                    @error('website')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="logo">logo</label>
                    <input type="file" name="logo" id="image" class="form-control">
                    @error('logo')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>

@endsection
