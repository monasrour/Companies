@extends('layouts.parent')
@section('title')
    <h1>All Campanies</h1>
@endsection
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
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">logo</th>
               <th scope="col">website</th>
               <th scope="col">operation</th>
           </tr>
           </thead>
           <tbody>
         @foreach($campanies as $company)
             <tr>
                 <th scope="row">{{$company->id}}</th>
                 <td>{{$company->name}}</td>
                 <td>{{$company->email}}</td>
                 <td><img src="{{ asset('images/campanies/' . $company->logo) }}" alt="{{ $company->name }}" height="50"></td>
                 <td>{{$company->website}}</td>
                 <td>
                     <a href="{{route('dashboard.campanies.edit',$company->id)}}" class="btn btn-outline-warning btn-sm">Edit</a>
{{--                     <a href="{{route('dashboard.campanies.destroy')}}" class="btn btn-outline-danger btn-sm">Delete</a>--}}
                     <form method="POST" action="{{ route('dashboard.campanies.destroy', $company->id) }}" style="display: inline-block;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
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
