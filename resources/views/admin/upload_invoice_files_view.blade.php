@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">All Files Attached</h1>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">List of Files</h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @php
                        $files = explode(',', $shippment_requests[0]->paid_invoice_path);
                    @endphp
                    @foreach ($files as $file)
                        <li class="list-group-item">
                            <a href=" {{ asset($file) }}">{{ basename($file) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
