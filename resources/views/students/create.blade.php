<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="my-4 ">Add Student</h2>
            <div class="mt-4">
                <a href="{{ route('student.list') }}" class="btn btn-outline-secondary"><--Back</a>
            </div>
        </div>
        <form action="{{ route('add-form')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="mb-4">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="mb-4">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" class="me-2 form-check-input" value="male">
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" class="form-check-input" value="female">
            </div>
            <div class="mb-3">
                <select name="major_id" id="" class="form-select" required>
                    <option value="" selected>Select Major</option>
                    @foreach ( $majors as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn  btn-primary">Add</button>
        </form>
    </div>
</body>
</html>