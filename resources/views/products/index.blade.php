@extends('products.layout')
 
@section('content')


<script>
    
jQuery(document).ready(function()
{
    jQuery('#myTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('products.index')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


});
</script>
<style>
.row{
    margin-top:15px;
}
.table{
    margin:100px;
}
</style>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                
                {{-- <a class="btn btn-light" href="{{ route('logout') }}" method="POST"> Logout</a> --}}
                <a class="btn btn-light" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
</thead>
<tbody>
</tbody>
        <!-- @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach -->
    </table>
@endsection