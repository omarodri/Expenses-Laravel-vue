<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    public function expenses()
    {
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
        return $this->hasMany(Expense::class);
    }
}