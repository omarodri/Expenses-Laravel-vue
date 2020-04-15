<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseReport;
use App\Mail\SummaryReport;
use Illuminate\Support\Facades\Mail;
use Auth;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ExpenseReport::all();
        $expenseReport = new ExpenseReport();

        // Incluided in challenge Omar
        return view('expenseReport.index',[
            'expenseReports' => $expenseReport->allAndUser()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $valideDate = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report = new ExpenseReport();
        $report->title = $valideDate['title'];
        $report->user_id = $user->id;

        $report->save();

        return redirect('/expense_reports')
        ->with('message', 'Expense Report was added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        // $report = ExpenseReport::findOrFail($id);
        if($expenseReport->user_id == Auth::user()->id){
            return view('expenseReport.show', [
                'report' => $expenseReport
            ]);
        }
        else {
            return redirect('/expense_reports')
            ->with('message', 'Access denied to that report!');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
            'report' => $report
        ]);
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
        $valideDate = $request->validate([
            'title' => 'required|min:5'
        ]);

        $report = ExpenseReport::findOrFail($id);
        $report->title = $valideDate['title'];
        $report->save();

        return redirect('/expense_reports')
        ->with('message', 'Expense Report was updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();

        return redirect('/expense_reports')
        ->with('message', 'Expense Report was deleted successfuly!');
    }

    public function confirmDelete($id){
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.delete',[
            'id' => $id,
            'title' => $report->title
        ]);
    }

    public function sendMail($id){
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.sendMail',[
            'report' => $report
        ]);
    }

    public function confirmSendMail(Request $request, $id){
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));

        return redirect('/expense_reports/'. $id)
        ->with('message', 'Expense Report Email was sended successfuly!');
    }
}