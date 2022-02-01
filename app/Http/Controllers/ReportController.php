<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:reports.day',
            'permission:reports.date',
            'permission:report.results'
        ]);
    }
    public function reports_day(){
        $sales = Sale::WhereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_day', compact('sales', 'total'));
    }
    public function reports_date(){
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->sum('total');

        // $ventasdia = Sale::where('status', 'VALID')->select(
        //     DB::raw("count(*) as count"),
        //     DB::raw("SUM(total) as total"),
        //     DB::raw("DATE_FORMAT(sale_date,'%D %M %Y') as date")
        // )->groupBy('date')->take(30)->get();

        return view('admin.report.reports_date', compact('sales', 'total'));
    }
    public function report_results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total'));

    }
    public function reports_purchase(){
        $purchases = Purchase::all();
        $total = $purchases->sum('total');
        return view('admin.report.reports_purchase',compact('purchases', 'total'));

    }
    public function report_resultsPurchase(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $purchases = Purchase::whereBetween('purchase_date', [$fi, $ff])->get();
        $total = $purchases->sum('total');
        return view('admin.report.reports_purchase', compact('purchases', 'total'));

    }
}
