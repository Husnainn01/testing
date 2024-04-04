@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">All Documents Attached</h1>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_shipping_documents.create',$shippment->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Attach Documents</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="documentTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SERIAL</th>
                                <th>VESSEL NAME</th>
                                <th>DOCUMENT</th>
                                <th>DETAILS</th> 
                                <th>TYPE</th> 
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($documents as $document)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $document->vessel_name }}</td> 
                                    <td>
                                        <a href="{{ route('download.shipping_documents', $document->id) }}">
                                            <i class="fas fa-file-pdf"></i> {{ $document->name }}
                                        </a>
                                    </td>
                                    <td>{{ $document->details }}</td> 
                                    <td>{{ $document->status }}</td> 
                                    <td>
                                        <form action="{{ route('admin_shipping_documents.destroy', $document->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ ARE_YOU_SURE }}');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Documents Attached yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#documentTable').DataTable();
        });
    </script>
@endsection
