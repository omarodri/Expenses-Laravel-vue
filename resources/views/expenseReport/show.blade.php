@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Report: <span class="small">{{ $report->title }}</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports">Back</a>
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
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/expense_reports/{{ $report->id }}/expenses/create" class="btn btn-primary">Add Expense</a>
        </div>
    </div>
@endsection

