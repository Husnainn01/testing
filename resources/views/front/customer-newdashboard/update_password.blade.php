@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Update Password</li>

    </ul>
    <h3 class="fw-medium ">Update Password</h3>

</section>
<section class="container-fluid py-4 bg-light">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12"><p class="text-center ">Field with a <span class="text-danger">*</span> are required!</p></div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('update_account_info') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Other form fields -->

        <div class="input-group mb-3">
            <span class="input-group-text">New Password <span class="text-danger">*</span></span>
            <input type="password" required aria-label="New Password" class="form-control" name='password' id="password">
        </div>
        <!-- <div class="input-group mb-3">
            <span class="input-group-text">Confirm Password<span class="text-danger">*</span></span>
            <input type="password" required aria-label="Confirm Password" class="form-control" name='confirm_password' id="confirmPassword">
        </div> -->

        <button type="submit" class="btn btn-primary m-auto d-block px-5 py-2 mt-3">Save Changes</button>
    </form>

</section>
@endsection
