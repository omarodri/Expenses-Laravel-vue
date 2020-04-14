<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="row">
    <div class="col">
        <h1>Expense Report {{ $report->id }}: {{ $report->title }}</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Expenses</h2>
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
