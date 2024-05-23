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
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('salaries.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('salaries.destroy', $row->id) . '" method="POST" style="display:inline;"> ' . csrf_field() . method_field("DELETE") . ' <button type="submit" class="btn btn-danger btn-sm">Delete</button> </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $salaries = Salary::latest();
        return view('dashboard.salary.index', compact('salaries'));
    }
    public function create()
    {
        return view('dashboard.salary.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nominal' => 'required|integer'
        ]);

        Salary::create($request->all());

        return redirect()->route('salaries.index')->with('success', 'Salary created successfully.');
    }

    public function show($id)
    {
        $salary = Salary::findOrFail($id);
        return view('dashboard.salary.show', compact('salary'));
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        return view('dashboard.salary.edit', compact('salary'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nominal' => 'required|integer'
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update($request->all());

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    public function destroy($id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
