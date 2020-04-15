<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class ExpenseReport extends Model
{
    public function expenses()
    {
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
        return $this->hasMany(Expense::class);
    }

    // Incluided in challenge Omar
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Incluided in challenge Omar
    public function allAndUser(){
        $user =  Auth::user();

        $totals = DB::table('expenses')
            ->select('expenses.expense_report_id',DB::raw('SUM(expenses.amount) as total'))
            ->groupBy('expenses.expense_report_id');

        $expenseReports = DB::table('expense_reports')
            ->join('users', 'users.id', '=', 'expense_reports.user_id')
            ->leftJoinSub($totals, 'expenses', function ($join) {
                    $join->on('expense_reports.id', '=', 'expenses.expense_report_id');
                })
            ->select('users.*', 'expense_reports.*','total')
            ->where('users.id', '=', $user->id)
            ->get();

        return $expenseReports;
    }
}