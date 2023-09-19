@extends('layouts.parent')
@section('title')
    <h1>All Employees </h1>
@endsection
@include('components.message')
@section('css')

    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    @include('components.message')
    <div class="col-12" >

        <table class="table" id="example1">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">first Name</th>
                <th scope="col">last Name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">company</th>
                <th scope="col">operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Employees as $Employee)
                <tr>
                    <th scope="row">{{$Employee->id}}</th>
                    <td>{{$Employee->first_name}}</td>
                    <td>{{$Employee->last_name	}}</td>
                    <td>{{$Employee->email}}</td>
                    <td>{{$Employee->phone}}</td>
                    <td>{{$Employee->company->name ?? ""}}</td>
                    <td>
                        <a href="{{ route('dashboard.employees.edit', $Employee->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
{{--                        <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>--}}
                        <form method="POST" action="{{ route('dashboard.employees.destroy', $Employee->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div  >



@endsection
@section('js')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
