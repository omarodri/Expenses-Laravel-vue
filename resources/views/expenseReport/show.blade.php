@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Report: <span class="small">{{ $report->title }}</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports">Back</a>
            <a class="btn btn-success" href="/expense_reports/{{ $report->id }}/sendMail">Send Report</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Details</h3>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($report->expenses as $expense)
                        <tr>
                            <td scope="row">{{ $expense->description }}</td>
                            <td>{{ $expense->created_at }}</td>
                            <td>{{ $expense->amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td style="text-align:right">
                                {{$report->expenses->sum('amount')}}
                            </td>
                        </tr>
                    </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/expense_reports/{{ $report->id }}/expenses/create" class="btn btn-primary">Add Expense</a>
        </div>
    </div>
@endsection

