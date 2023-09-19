@extends('layouts.parent')
@section('title','Add Employee')

@section('content')
    @include('components.message')
    <div class="col-12">
        <form action="{{route('dashboard.employees.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-12 mt-3" >
                    <label for="name">first name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="first name">
                    @error('first_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3" >
                    <label for="lastname">last name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="last name">
                    @error('last_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="phone">phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="phone">
                    @error('phone')
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
                    <label for="company">company</label>
                   <select name="company_id" id="company_id" class="form-control">
                       @foreach($companies as $company)
                           <option value="{{$company->id}}">{{$company->name}}</option>
                       @endforeach

                   </select>
                    @error('company_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>

@endsection
