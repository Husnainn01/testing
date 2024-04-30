@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Create Shipping Document</h1>
    <form action="{{ route('admin_shipping_documents.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_shippment_requests') }}" class="btn btn-primary btn-sm"><i
                            class="fa fa-plus"></i> Back Shippment Request</a>
                </div>
                <label for="vessel_name">Vessel Name</label>
                <input type="text" class="form-control" name="vessel_name" placeholder="Enter the Vessel title" required>
                <br>
                <h4>Choose the type of Document</h4>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_pol_pod"
                        value="export_document">
                    <label class="form-check-label" for="s">Export Certificate</label>
                </div>
                {{-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_etd_eta" value="etd_eta">
                    <label class="form-check-label" for="status_etd_eta">Export Certificate</label>
                </div> --}}
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_pol_pod" value="lc">
                    <label class="form-check-label" for="status_pol_pod">L/C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_pol_pod" value="other">
                    <label class="form-check-label" for="status_bl_document">Other</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_pol_pod" value="bl_document">
                    <label class="form-check-label" for="bol">Bol</label>
                </div>

            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="number" hidden name="shippment_id" value="{{ $id }}">
                    {{-- <input type="text" hidden name="shippment_id" value="details"> --}}
                    {{-- <label for="details">Document Details *</label> --}}
                    <textarea name="details" hidden class="form-control" rows="5" required>kjiugug</textarea>
                </div>
                <div class="form-group">
                    <label for="documents">Upload Documents *</label>
                    <input type="file" name="documents[]" class="form-control-file" multiple
                        accept=".pdf , .png , .jpg , .jpeg" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection
