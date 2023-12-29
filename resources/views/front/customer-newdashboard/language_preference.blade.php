@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Accounting Settng</li> >
        <li class="list-inline-item mx-2">Language Preferences</li>
    </ul>
    <h3 class="fw-medium">Language Preferences</h3>
    <p>Set your preferred language to be shown on our web sites. The setting of Language menu, located at the right end of header area on each web page, will be changed automatically to the preferred one you set here once logged in. No longer need to change the setting manually every time.</p>
</section>
<section class="container-fluid text-center bg-light py-3">

<div class="m-auto d-block w-50">
<div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Language</label>
    <select class="form-select" id="inputGroupSelect01">
      <option selected>Choose...</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>
</div>
<button class="btn btn-success text-white m-auto d-block px-5 py-2">Save Changes</button>
</section>


@endsection
