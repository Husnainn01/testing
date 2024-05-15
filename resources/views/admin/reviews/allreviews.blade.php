@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Client Reviews</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Review Text</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>{{ ACTION }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($clientreviews as $row)
                            @php ++$i; @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img style="width:200px" src="{{ asset($row->img) }}"></td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->rating }}</td>
                                <td>
                                    <select class="form-control status-select" data-shipping-id="{{ $row->id }}">
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
                                    <a href="#" class="btn btn-warning btn-sm">
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
    <script>
        $(document).ready(function() {
            $('.status-select').change(function() {
                var shippingId = $(this).data('shipping-id');
                var newStatus = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin_modify_review_status') }}',
                    data: {
                        shippingId: shippingId,
                        invoice_status: newStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.success) {

                            toastr.success('Review Updated');

                        } else {
                            // Display an error alert
                            toastr.error('Review Update Fail');
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
@endsection
