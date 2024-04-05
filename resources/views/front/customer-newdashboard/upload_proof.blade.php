@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">All Inovices</li>

    </ul>
    <h3 class="fw-medium">Upload Proof of Payment</h3>
    <small>It contains all the quotations you have requested.</small>
</section>
<section class="container-fluid">
    <div class="table-container w-100 overflow-x-auto">
        <div class="table-container">
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
                        <th>Action</th>
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

                           <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-upload fs-4"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Upload Images"></i>
                          </button>
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Images</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="upload__box">
                                        <div class="upload__btn-box">
                                          <label class="upload__btn  m-auto d-block w-50">
                                            <i class="fa-solid fa-cloud-arrow-up fs-1"></i>
                                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                                          </label>
                                        </div>
                                        <div class="upload__img-wrap"></div>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </td>
                    </tr>

                </tbody>
                </table>
        </div>
    </div>

</section>
@endsection
