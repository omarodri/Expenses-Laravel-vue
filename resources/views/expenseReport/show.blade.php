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
Details
        </div>
    </div>
@endsection

