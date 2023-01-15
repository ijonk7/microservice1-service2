<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Data - Service 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2>SERVICE 2</h2>
        <p>Display data sent from Service 1:</p>
        <table class="table">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Value</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $l)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $l['value'] }}</td>
                <td>{{ $l['created_at']->format('d-m-Y H:i:s') }}</td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
        </tbody>
        </table>
    </div>
</body>
</html>
