<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Payroll;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class PayrollController extends Controller
{

    public function showForm()
    {
        return view('employee.payroll.index');
    }

    public function getPayroll(Request $request)
    {
        $month = $request->input('month');
        $payrolls = Payroll::where('name', auth()->user()->name)
                          ->where('month', $month)
                          ->get();

        return view('employee.payroll.form', compact('payrolls'));
    }

    public function generatePDF()
{
    $payrolls = Payroll::all();
    $dompdf = new Dompdf();
    $html = view('pdf.dashboard', compact('payrolls'))->render();

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A5', 'portrait');
    $dompdf->render();

    return $dompdf->stream("payrolls.pdf");
}
}
