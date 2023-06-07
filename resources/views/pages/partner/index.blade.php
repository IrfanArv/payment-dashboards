@extends('layouts.app')
@section('title', 'My Partners')
@section('content')

    <div class="d-flex justify-content-between mb-3">
        <div>
            <button type="button" id="addPartner" class="btn btn-outline-primary rounded-pill me-2">
                <span class="tf-icons ti-xs ti ti-plus me-1"></span>New Partner
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-datatable table-responsive">
            <table id="data-table" class="table border-top">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Owner</th>
                        <th>Biling Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('partner.datas') }}",
                columns: [{
                        data: 'office',
                        name: 'office'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'billingAddress',
                        name: 'billingAddress'
                    },
                    {
                        data: 'isActive',
                        name: 'isActive'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                responsive: true,
                displayLength: 7,
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>r',
                lengthMenu: [
                    [7, 10, 25, 50, 75, 100, -1],
                    [7, 10, 25, 50, 75, 100, "All"]
                ],

                buttons: [{
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle me-2',
                    text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                    buttons: [{
                            extend: 'excel',
                            text: '<i class="ti ti-file-spreadsheet me-1" ></i>Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="ti ti-printer me-1" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-description me-1"></i>PDF File',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        }
                    ]
                }],
            });
            $('div.head-label').html('<h5 class="card-title mb-0">My Partners</h5>');
        });
    </script>
@endpush
