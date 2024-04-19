@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Paid Invoices</h1>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 350px;
            /* Could be more or less, depending on screen size */
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            text-align: right;
        }

        .end {
            text-align: end;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form styles */
        form {
            margin-top: 20px;
        }

        form input[type="file"] {
            margin-bottom: 10px;
        }

        form button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
        </div>
        {{-- <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SHIPPING ID</th>
                        <th>Consignee Name</th>
                        <th>Consignee Company</th>
                        <th>Consignee Email</th>
                        <th>Consignee Phone</th>
                        <th>Shipment Status</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($shippment_requests as $row)
                        <tr>
                            <td>{{ $row->shipping_id }}</td>
                            <td>{{ $row->default_name }}</td>
                            <td>{{ $row->default_company_name }}</td>
                            <td>{{ $row->default_email }}</td>
                            <td>{{ $row->default_phone_number }}</td>
                            <td>
                                <select class="form-control status-select" data-shipping-id="{{ $row->id }}">
                                    <option value="pending" {{ $row->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $row->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="cancelled" {{ $row->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <a href="{{ route('admin_shippment_show', $row->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SHIPPING ID</th>
                            <th>Consignee Name</th>
                            <th>Consignee Company</th>
                            <th>Consignee Email</th>
                            <th>Consignee Phone</th>
                            <th>Invoice Status</th>
                            <th>{{ ACTION }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($shippment_requests as $row)
                            {{-- @php dd($row); @endphp --}}
                            @if (!empty($row->paid_invoice_path))
                                <tr>
                                    <td>{{ $row->shipping_id }}</td>
                                    <td>{{ $row->default_name }}</td>
                                    <td>{{ $row->default_company_name }}</td>
                                    <td>{{ $row->default_email }}</td>
                                    <td>{{ $row->default_phone_number }}</td>
                                    <td>
                                        <select class="form-control status-select-ol"
                                            data-shipping-id="{{ $row->id }}">
                                            <option value="pending" {{ $row->status === 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="approved" {{ $row->status === 'approved' ? 'selected' : '' }}>
                                                Approved</option>
                                            <option value="cancelled" {{ $row->status === 'cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ asset($row->invoice_path) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-eye"></i> View
                                        </a>


                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Popup/modal for uploading file -->
        <div id="uploadModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Upload Invoice</h2>
                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="invoiceFile" id="invoiceFile">
                    <input type="hidden" name="shippingId" id="shippingId">
                    <div class="w-100 end">
                        <button type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.status-select').change(function() {
                var shippingId = $(this).data('shipping-id');
                var newStatus = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin_modify_shipping_status') }}',
                    data: {
                        shippingId: shippingId,
                        newStatus: newStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                timer: 5000, // Duration in milliseconds (adjust as needed)
                                showConfirmButton: false
                            });
                            location.reload();
                        } else {
                            // Display an error alert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error updating status'
                            });
                        }
                    },
                    error: function(xhr) {
                        // Display an error alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error updating status: ' + xhr.statusText
                        });
                    }
                });
            });
        });
    </script>

    {{-- <script>
        // JavaScript/jQuery to open the popup when upload icon is clicked
        $(document).ready(function() {
            $(".upload-invoice").click(function() {
                var shippingId = $(this).data('shipping-id');
                // Open the modal here
                $("#uploadModal").css("display", "block");
                // You can use AJAX to populate the modal with specific data related to the shippingId
            });

            // Close the modal when the close button is clicked
            $(".close").click(function() {
                $("#uploadModal").css("display", "none");
            });

            // Close the modal when user clicks outside of it
            $(window).click(function(event) {
                if (event.target.id === "uploadModal") {
                    $("#uploadModal").css("display", "none");
                }
            });
        });
    </script> --}}

    <script>
        // JavaScript/jQuery to open the popup when upload icon is clicked
        $(document).ready(function() {
            $(".upload-invoice").click(function() {
                var shippingId = $(this).data('shipping-id');
                // Set the shippingId value in the hidden input field
                $("#shippingId").val(shippingId);
                // Open the modal here
                $("#uploadModal").css("display", "block");
            });

            // Close the modal when the close button is clicked
            $(".close").click(function() {
                $("#uploadModal").css("display", "none");
            });

            // Close the modal when user clicks outside of it
            $(window).click(function(event) {
                if (event.target.id === "uploadModal") {
                    $("#uploadModal").css("display", "none");
                }
            });

            // AJAX form submission
            $("#uploadForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '{{ route('admin_modify_shipping_status') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // console.log("File uploaded successfully");
                        // Optionally, you can close the modal after successful upload
                        $("#uploadModal").css("display", "none");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            timer: 5000, // Duration in milliseconds (adjust as needed)
                            showConfirmButton: false
                        });
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error Uploading file'
                        });
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // Function to handle delete invoice button click
            $(".delete-invoice").click(function() {
                var shippingId = $(this).data('shipping-id');
                // Show a confirmation dialog before deleting the invoice
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms deletion, perform AJAX request to delete the invoice
                        $.ajax({
                            url: '{{ route('admin_modify_shipping_status') }}',
                            type: 'POST',
                            data: {
                                shippingId: shippingId,
                                action: 'delete',
                                _token: '{{ csrf_token() }}' // Add CSRF token
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    timer: 5000, // Duration in milliseconds (adjust as needed)
                                    showConfirmButton: false
                                });
                                window.location.reload();
                                // Optionally, you can reload the page or update the UI after successful deletion
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error deleting file'
                                });
                            }
                        });
                    }
                });
            });

            // Other existing code remains unchanged...
        });
    </script>
@endsection
