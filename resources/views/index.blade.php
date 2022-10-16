<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Admin Panel</h1>
        <div class="d-flex justify-content-between my-5">
            <a href="{{ url('/students') }}" class="btn btn-info">Student</a>
            <a href="{{ route('major.list') }}" class="btn btn-success">Major</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Major</th>
            </thead>
            <tbody>
            
                    @foreach ($students as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->major->name }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>