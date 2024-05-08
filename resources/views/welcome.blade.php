<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>
<body>
<div class="container mt-5">
    <form method="POST" action="/addemployee">
        @csrf
        <div class="form-group mb-2">
            <label for="emp_name">Employee Name</label>
            <input type="text" class="form-control" name="emp_name" placeholder="Enter Your name">
        </div>
        <div class="form-group mb-2">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address">
        </div>
        <div class="form-group mb-2">
            <label for="contact_num">Contact Number</label>
            <input type="text" class="form-control" name="contact_num" placeholder="Contact Number">
        </div>
        <div class="form-group mb-2">
            <label for="email_add">Email Address</label>
            <input type="email" class="form-control" name="email_add" placeholder="Email Address">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table mt-5">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Email Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($employee) > 0)
            @foreach ($employee as $emp)
                <tr>
                    <th>{{ $emp->id }}</th>
                    <th>{{ $emp->emp_name }}</th>
                    <th>{{ $emp->address }}</th>
                    <th>{{ $emp->contact_num }}</th>
                    <th>{{ $emp->email_add }}</th>
                    <th><a href="/edit/{{ $emp->id }}" class="btn btn-primary">Edit</a>
                        <a href="/delete/{{ $emp->id }}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
            @endforeach
        @else
            <tr>
                <th>No Data</th>
            </tr>
        @endif
    </tbody>
</table>
</div>
</body>
</html