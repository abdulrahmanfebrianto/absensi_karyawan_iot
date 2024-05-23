<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Salary::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="edit btn btn-info btn-sm showSalary">Show</a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editSalary">Edit</a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteSalary">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.salary.index');
    }

    public function store(Request $request)
    {
        Salary::updateOrCreate(
            ['id' => $request->salary_id],
            ['name' => $request->name, 'nominal' => $request->nominal]
        );

        return response()->json(['success' => 'Salary saved successfully.']);
    }

    public function edit($id)
    {
        $salary = Salary::find($id);
        return response()->json($salary);
    }

    public function destroy($id)
    {
        Salary::find($id)->delete();
        return response()->json(['success' => 'Salary deleted successfully.']);
    }
}
