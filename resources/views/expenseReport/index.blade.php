@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Reports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/expense_reports/create">Create New Report</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Expense</th>
                        <th colspan="2">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenseReports as $expenseReport)
                        <tr>
                            <td scope="row">{{ $expenseReport->id }}</td>
                            <td scope="row"><a href="\expense_reports/{{ $expenseReport->id}}">{{ $expenseReport->title }}</a></td>
                            <td scope="row"><a href="\expense_reports/{{ $expenseReport->id}}/edit">Edit</a></td>
                            <td scope="row"><a href="\expense_reports/{{ $expenseReport->id}}/confirmDelete">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
