<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Service 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2>SERVICE 2</h2>
        <p>Get one row of data from Service 3 via API:</p>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $c)
                <tr>
                    <td>{{ $c['id'] }}</td>
                    <td>{{ $c['name'] }}</td>
                    <td>{{ $c['phone_number'] }}</td>
                    <td>{{ $c['address'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
