<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function expenseReport()
    {
        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo(ExpenseReport::class);
    }


}