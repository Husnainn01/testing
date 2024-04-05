@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Track Shipment</li>

    </ul>
    <h3 class="fw-medium">Track Shipment</h3>

</section>
<div class="col-12">
    <form action="{{ route('shippind_doc') }}" method="post" enctype="multipart/form-data" method="post">
        @csrf
        <div class="px-4 py-3 row">
            <div class="col-4">
                <label for="" class="w-100"> Country
                    <select name="service" id="service" class="form-control">
                        <option selected>Choose</option>
                        <option value="roro">Roro</option>
                        <option value="container_plan">Container Plan</option>
                    </select>
                </label>
            </div>
             <div class="col-4">
                <label for="" class="w-100"> Car Name
                    <input type="text" name="shippent_id" class="form-control w-100">
                </label>
            </div>
            <div class="col-4 mt-3">
                <label for="" class="w-100"> Chasis no
                    <input type="text" name="shippent_id" class="form-control w-100">
                </label>
            </div>
            <div class="col-4 mt-3">
                <label for="" class="w-100"> Yard Location
                    <input type="text" name="shippent_id" class="form-control w-100">
                </label>
            </div>
            <div class="col-4 mt-3">
                <label for="" class="w-100"> Vessel Name
                    <input type="text" name="shippent_id" class="form-control w-100">
                </label>
            </div>
            <div class="col-4 mt-3">
                <label for="" class="w-100"> Consignee Name
                    <input type="text" name="shippent_id" class="form-control w-100">
                </label>
            </div>
            <button class="btn btn-primary ms-auto d-block my-3 w-25" type="submit">Search</button>
        </div>
    </form>
</div>

<div class="col-12">
<div class="table-responsive">
<table class="table table-striped track-table" style="width:100%">
<thead>
    <tr>
        <th>Country</th>
        <th>Export Certificate Release</th>
        <th>Order Date</th>
        <th>SS No</th>
        <th>Photo</th>
        <th>Car Name/ Chassis No</th>
        <th>Vessel Name</th>
        <th>ETD / POL</th>
        <th>ETA / POD</th>
        <th>Consignee Name / Location</th>
    </tr>
</thead>
<tbody>

    <tr>
        <td>
           dumi
        </td>
        <td>
            dumi
        </td>
        <td>
            dumi
        </td>
        <td>
            dumi

        </td>
        <td>
            dumi
        </td>
        <td>

            dumi
        </td>
        <td>
            dumi
        </td>
        <td>
            dumi
        </td>
        <td>
            dumi
        </td>
        <td>
            dumi
        </td>
    </tr>

</tbody>
</table>
</div>
</div>

@endsection
