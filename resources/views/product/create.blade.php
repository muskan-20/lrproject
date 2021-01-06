@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
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
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text"  name = "product_name" class="form-control" id="exampleInputname" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Detail</label>
                    <input type="text"  name = "product_detail" class="form-control" id="exampleInputname" placeholder="Enter Detail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="text"  name = "product_price" class="form-control" id="exampleInputname" placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file"  name = "product_image" class="form-control" id="exampleInputname" >
                  </div>
                  
                
                
                    <div class="form-group">
                      <label for="exampleInputEmail1">SubCategory Name</label>
                      <select name="subcategory_id" class="form-control" >
                          <option value="" selected disabled>Select</option>
                          @foreach ($subcatarray as $subcat)
                                <option value="{{ $subcat->subcategory_id }}">{{$subcat->subcategory_name}}</option>
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