<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="my-4 ">Update Student</h2>
            <div class="mt-4">
                <a href="{{ route('student.list') }}" class="btn btn-outline-secondary"><--Back</a>
            </div>
        </div>
        <form action="{{ route('update-form', $student->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="<?= old('name')?? $student->name?>" required>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email"  value="<?= old('email')?? $student->email?>" required>
            </div>
            <div class="mb-3">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone"  value="<?= old('phone')?? $student->phone?>" required>
            </div>
            <div class="mb-4">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address"  value="<?= old('address')?? $student->address?>" required>
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
                        <option value="{{ $item->id }}" @if(isset($student->major->name)??$student->major_name == $item->name) selected @endif>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn  btn-primary">Update</button>
        </form>
    </div>
</body>
</html>