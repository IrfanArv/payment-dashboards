<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use DataTables;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:client-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return view('pages.partner.index');
    }

    public function getPartnerData()
    {
        $data = Partner::orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('isActive', function ($row) {
                if ($row->isActive === true) {
                    return '<button type="button" class="btn btn-sm rounded-pill btn-label-success waves-effect waves-light">Active</button>';
                } else {
                    return '<button type="button" class="btn btn-sm rounded-pill btn-label-secondary waves-effect waves-light">Inactive</button>';
                }
            })
            ->addColumn('action', function ($row) {
                return '<div class="d-inline-block">
              <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-secondary ti ti-pencil"></i></a>
              <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-secondary ti ti-dots-vertical"></i></a>
              <ul class="dropdown-menu dropdown-menu-end m-0">
                <li><a href="javascript:;" class="dropdown-item">Disable</a></li>
                <li><a href="javascript:;" class="dropdown-item">Enable</a></li>
              </ul>
            </div>';
            })
            ->rawColumns(['action', 'isActive'])
            ->make(true);
    }
}
