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
                <a href="{{ url('ajax/students') }}" class="btn btn-outline-secondary"><--Back</a>
            </div>
        </div>
        <form action="" method="POST" id="form">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="mb-4">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>
            <div class="mb-4">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" class="me-2 form-check-input" value="male">
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" class="form-check-input" value="female">
            </div>
            <div class="mb-3">
                <select name="major_id" id="" class="form-select" id="major">
                </select>
            </div>
            <button type="submit" class="btn  btn-primary" id="submit">Add</button>
        </form>
    </div>
    <script src="{{ asset('js/library/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('js/ajax/create.js') }}"></script>
</body>
</html>