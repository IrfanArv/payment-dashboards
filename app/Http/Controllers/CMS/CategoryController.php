<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('pages.product.category');
    }

    public function getCategoryData()
    {
        $data = Category::orderBy('name', 'ASC')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('isActive', function ($row) {
                if ($row->isActive === true) {
                    return '<button type="button" class="btn btn-sm rounded-pill btn-label-success waves-effect waves-light">Active</button>';
                } else {
                    return '<button type="button" class="btn btn-sm rounded-pill btn-label-secondary waves-effect waves-light">Inactive</button>';
                }
            })
            ->editColumn('icon', function ($row) {
                if ($row->icon !== null) {
                    return '<i class="ti ' . $row->icon . ' ti-lg me-3"></i> <strong>' . $row->name . '</strong>';
                } else {
                    return '<i class="ti ti-category ti-lg me-3"></i> <strong>' . $row->name . '</strong>';
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
            ->rawColumns(['action', 'isActive', 'icon'])
            ->make(true);
    }
}
