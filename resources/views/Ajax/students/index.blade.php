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
                <a href="{{ url('ajax/students/create') }}" class="btn btn-outline-primary">Add Student</a>
            </div>
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
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/library/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('js/ajax/show.js') }}"></script>
</body>
</html>