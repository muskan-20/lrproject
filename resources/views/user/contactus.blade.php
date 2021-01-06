@extends('layout.master1')
@section('content')
<div class="contact py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>ontact
            <span>U</span>s
        </h3>
        <!-- //tittle heading -->
        <div class="row contact-grids agile-1 mb-5">
            <div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
                
            </div>
            <div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
                <div class="contact-grid1 text-center">
                    
                </div>
            </div>
            <div class="col-sm-4 contact-grid agileinfo-6">
                <div class="contact-grid1 text-center">
                    
                </div>
            </div>
        </div>
        <!-- form -->
        <form action="#" method="post">
            <div class="contact-grids1 w3agile-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6 contact-form1 form-group">
                        <label class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="Name" placeholder="" required="">
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form1 form-group">
                        <label class="col-form-label">E-mail</label>
                        <input type="email" class="form-control" name="Email" placeholder="" required="">
                    </div>
                </div>
                <div class="contact-me animated wow slideInUp form-group">
                    <label class="col-form-label">Message</label>
                    <textarea name="Message" class="form-control" placeholder="" required=""> </textarea>
                </div>
                <div class="contact-form">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
        <!-- //form -->
    </div>
</div>

@endsection