<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Setting;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $userTag = Auth::user()->tag;

        $filterDate = $request->input('filterDate');
        $filterMonth = $request->input('filterMonth');
    
        $inAttendancesQuery = Attendance::where('tag', $userTag)->where('information', 'in');
        $outAttendancesQuery = Attendance::where('tag', $userTag)->where('information', 'out');
        $absenceQuery = Attendance::select('date')
                                    ->where('tag', $userTag)
                                    ->groupBy('date');
    
        if ($filterDate) {
            $filterDate = Carbon::parse($filterDate)->format('Y-m-d');
            $inAttendancesQuery->whereDate('date', $filterDate);
            $outAttendancesQuery->whereDate('date', $filterDate);
            $absenceQuery->whereDate('date', $filterDate);
        }
        if ($filterMonth) {
            $filterMonth = Carbon::parse($filterMonth)->format('Y-m');
            $inAttendancesQuery->whereMonth('date', Carbon::parse($filterMonth)->month);
            $outAttendancesQuery->whereMonth('date', Carbon::parse($filterMonth)->month);
            $absenceQuery->whereMonth('date', Carbon::parse($filterMonth)->month);
        }
    
        $inAttendances = $inAttendancesQuery->get();
        $outAttendances = $outAttendancesQuery->get();
        $absences = $absenceQuery->get()->map(function ($attendance) use ($userTag) {
            $in = Attendance::where('tag', $userTag)->where('status', 'Masuk')->whereDate('date', $attendance->date)->first();
            $out = Attendance::where('tag', $userTag)->where('status', 'keluar')->whereDate('date', $attendance->date)->first();
            $late = Attendance::where('tag', $userTag)->where('status', 'Telat')->whereDate('date', $attendance->date)->first();
          
            $status = 'Bekerja';
            $penalty = 0;
            
            $settings = Setting::first(); 
            $fine = $settings ? $settings->fine : 0;

            if ($late) {
                $penalty = $fine;
            }

            if ($in && $out) {
                $status = 'Bekerja';

            }

            
            return [
                'date' => $attendance->date,
                'status' => $status,
                'penalty' => $penalty,
            ];
        });
    
        return view('employee.posts.index', compact('inAttendances', 'outAttendances', 'absences'));
    }
}
