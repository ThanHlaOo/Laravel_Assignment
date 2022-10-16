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
            <h1>Majors</h1>
            <div class="mt-1">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary"><-- Back</a>
                <a href="{{ url('majors/add') }}" class="btn  btn-outline-primary">Add Major</a>
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
                <th>Major_Code</th>
            </thead>
            <tbody>
                    @foreach ($majors as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>
                                <a href="{{ url("majors/edit/{$item->id}") }}" class="btn btn-warning">Update</a>
                                <form action="{{ url("majors/delete/{$item->id}") }}" method="POST" class="d-inline-block">
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