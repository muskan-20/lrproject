@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SubCategory Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SubCategory Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">SubCategory Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category Name</th>
                      
                      <th colspan="2">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($subcatarray as $subcat)
                    <tr>
                    <td>{{ $subcat->subcategory_id }}</td>
                    <td>{{ $subcat->subcategory_name }}</td>
                    <td>{{ $subcat->category_name }}</td>
                    <td><a href="{{ route('subcategory.edit',$subcat->subcategory_id) }}" class='button'>Edit</a></td>
                    <td>
                    <form action="{{route('subcategory.destroy',$subcat->subcategory_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='button'>Delete</button>
                    </form>
                    </td>
                     </tr>
                    @endforeach
                   </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection