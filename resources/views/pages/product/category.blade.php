@extends('layouts.app')
@section('title', 'Product Category')
@section('content')
    <div class="card">
        <div class="card-datatable table-responsive">
            <table id="data-table" class="table border-top">
                <thead>
                    <tr>
                        <th></th>
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
                ajax: "{{ route('category.datas') }}",
                columns: [{
                        data: 'icon',
                        name: 'icon'
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
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="ti ti-printer me-1" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-description me-1"></i>PDF File',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }
                    ]
                }],
            });
            $('div.head-label').html('<h5 class="card-title mb-0">Product Category</h5>');
        });
    </script>
@endpush
