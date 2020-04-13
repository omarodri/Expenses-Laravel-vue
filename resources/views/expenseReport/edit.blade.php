@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Report: <span class="small">{{ $report->title }}</span></h1>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        <strong>
        </strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        <script>
      $(".alert").alert();
    </script>
    @endif
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/expense_reports/ {{ $report->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" name="title" value="{{ $report->title }}" id="" class="form-control" placeholder="Type a Title" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

