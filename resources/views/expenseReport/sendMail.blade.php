@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Send Report</h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong></strong>
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

            <form action="/expense_reports/{{ $report->id }}/confirmSendMail" method="post">
                @csrf
                <div class="form-group">
                  <label for="email">Title:</label>
                  <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control" placeholder="Type a email" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary">Send Mail</button>
            </form>
        </div>
    </div>
@endsection

