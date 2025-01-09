@extends('master.master')
@section('title', 'Dashboard')
@section('content')
<section class="content">
    <div class="card-body">
        <div>
            <h1 class="text-center">Selamat Datang di Dashboard</h1>
        </div>
    </div>
    <!-- Post -->
    <div class="post">
        <div class="user-block">
          <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
          <span class="username">
            <a href="#"></a>
            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
          </span>
          <span class="description">Posted 5 photos - 5 days ago</span>
        </div>
        <!-- /.user-block -->
        <div class="row mb-3">
          <div class="col-sm-6">
            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
</section>
@endsection