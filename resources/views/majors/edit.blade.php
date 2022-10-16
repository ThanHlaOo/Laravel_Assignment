<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Major Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="my-4 ">Update Major</h2>
            <div class="mt-4">
                <a href="{{ route('major.list') }}" class="btn btn-outline-secondary"><-- Back</a>
            </div>
        </div>
        <form action="{{ route('major.update', $major->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" required value="<?= old('name')?? $major->name ?>">
            </div>
            <div class="mb-3">
                <label for="">Major Code</label>
                <input type="text" class="form-control" name="code" required value="<?= old('code')?? $major->code ?>">
            </div>
            <button type="submit" class="btn  btn-primary">Update</button>
        </form>
    </div>
</body>
</html>