@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Confirmation Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Are You sure you Want to Delete the Report "{{ $title }}" ?</h4>
            <form action="/expense_reports/{{ $id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="submit" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
@endsection

