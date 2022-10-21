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
        <div class="row my-5">
            <div class="col-2">
                <a href="{{ url('/students') }}" class="btn btn-info">Student</a>
            </div>
            <div class="col-8 ">
                <form action="{{ route('search') }}" method="get">
                    @csrf
                    <label for="search-text">
                       <input type="text" name="key" placeholder="Search Item" class="form-control">
                    </label>
                    <label for="startDate">
                        <input type="date" name="startDate" class="form-control" id="startDate">
                    </label>
                    <label for="endDate">
                        <input type="date" name="endDate" class="form-control" id="endDate">
                    </label>
                    <button type="submit" class="btn btn-primary mb-1">Search</button>
                </form>
            </div>
            <div class="col-2">
                <a href="{{ route('major.list') }}" class="btn btn-success">Major</a>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            
        </div>
        {!! $students->links() !!}
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Major</th>
                <th>Created Time</th>
                <th>Updated Time</th>
            </thead>
            <tbody>
            
                    @foreach ($students->items() as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->major->name ?? $item->major_name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                        </tr>
                    @endforeach
                    @if (!$students->items())
                        <tr>
                            <td class="h1 text-center" colspan="9">There is no record!</td>
                        </tr>
                    @endif
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>