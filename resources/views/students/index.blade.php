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
        <div class="d-flex justify-content-between mt-5">
            <h1>Students</h1>
            <div class="mt-1">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary"><-- Back</a>
                <a href="{{ url('students/add') }}" class="btn  btn-outline-primary">Add Student</a>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Major</th>
                <th>Actions</th>
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
                            <td>
                                <a href="{{ url("students/edit/{$item->id}") }}" class="btn btn-warning">Update</a>
                                <form action="{{ url("students/delete/{$item->id}") }}" method="POST" class="d-inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>