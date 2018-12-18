<?php
 
namespace App\Http\Controllers;
use Carbon\Carbon;
use Validator;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;





use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocksTable = \Lava::DataTable();
        $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Target Uang Masuk')
            ->addNumberColumn('Uang Masuk');
        foreach (getDatesOfWeek() as $value) {
           $stocksTable->addRow(["$value", 200000, getReportDay($value)]);
        }
        $Chart = \Lava::LineChart('this_is_the_label', $stocksTable, [
            'title'    => 'Data Uang Masuk',
            'fontSize' => 12,
        ]);

        return view('report');
    }

    public function getReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'startDate' => 'required',
            'endDate' => 'required' 
        ]);
        if ($validator->fails()) {
            return redirect('/report')
                        ->withErrors($validator)
                        ->withInput();
        }        
        $startDate   = Carbon::parse($request->input('startDate'))->format('Y-m-d 00:00:00');
        $endDate     = Carbon::parse($request->input('endDate'))->format('Y-m-d 23:59:59');
        $stocksTable = \Lava::DataTable();
        $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Target Uang Masuk')
            ->addNumberColumn('Uang Masuk');  
         foreach (returnDates($startDate,$endDate) as $value) {
            $stocksTable->addRow(["$value", 200000, getReportDay($value)]);
         }
        $Chart = \Lava::LineChart('this_is_the_label', $stocksTable, [
            'title'    => 'Data Uang Masuk',
            'fontSize' => 12,
        ]);
        return view('report')->with('endDate', $endDate)->with('startDate', $startDate);
    }

    public function export($start,$end) 
    {
        $userExport = new UsersExport;
        $userExport->start = $start;
        $userExport->end = $end;
        return Excel::download($userExport, 'users.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
