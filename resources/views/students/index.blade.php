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
            <div class="">
                <h1>Students</h1>
            </div>
            <div class="mt-1">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary"><-- Back</a>
                <a href="{{ url('students/add') }}" class="btn  btn-outline-primary">Add Student</a>
            </div>
        </div>
        <div class="my-2">
            <form method="POST" action="{{ route('import')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="studentImport" class="mb-2">Choose Excel File</label>
                    <input type="file" name="studentImport" id="studentImport" class="form-control" required>
                
                </div>
                <button type="submit" class="btn btn-outline-success">
                    Import
                </button>
                <a href="{{ route('export') }}" class="btn btn-outline-info me-3">Export</a>
                
            </form>

        </div>
       
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
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
                            <td>{{ $item->major->name ?? $item->major_name }}</td>
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
        {!! $students->links() !!}
    </div>
</body>
</html>