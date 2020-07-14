<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Crm;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crmForm()
    {
        return view('report.crm.form');
    }

    public function crmShow(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $startDateTime = $request->start_date . ' 00:00:00';
        $endDateTime = $request->end_date . ' 23:59:59';

        $crms = Crm::whereBetween('created_at', [$startDateTime, $endDateTime])->orderBy('id', 'desc')->get();


        return view('report.crm.show', compact('crms', 'startDate', 'endDate'));
    }

    
}
