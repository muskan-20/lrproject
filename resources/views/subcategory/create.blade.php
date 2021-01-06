@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SubCategory Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
              <li class="breadcrumb-item active">SubCategory Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SubCategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{route('subcategory.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory Name</label>
                    <input type="text"  name = "subcategory_name" class="form-control" id="exampleInputname" placeholder="Enter Name">
                  </div>
                  
                
                
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <select name="category_id" class="form-control" >
                          <option value="" selected disabled>Select</option>
                          @foreach ($catarray as $cat)
                                <option value="{{ $cat->category_id }}">{{$cat->category_name}}</option>
                          @endforeach
                      </select>
                    </div>
                    
                </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
          
            <!-- /.card -->
            <!-- /.card -->

            <!-- Input addon -->
           
            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection