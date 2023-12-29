@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Shipment Requests</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
        </div>
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
                        <th>Shipment Status</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach($shippment_requests as $row)
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('.status-select').change(function () {
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
                    success: function (response) {
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
                    error: function (xhr) {
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


@endsection
