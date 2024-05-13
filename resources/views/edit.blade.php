<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Employee App</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <div class="container mt-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="/edit/{{$employee->id}}">
                @csrf
                <div class="form-group mb-2">
                    <label for="emp_name">Employee Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="emp_name"
                        placeholder="Enter Your name"
                        value="{{$employee->emp_name}}"
                    />
                </div>
                <div class="form-group mb-2">
                    <label for="address">Phone Number</label>
                    <input
                        type="text"
                        class="form-control"
                        name="address"
                        placeholder="Address"
                        value="{{$employee->address}}"
                    />
                </div>
                <div class="form-group mb-2">
                    <label for="contact_num">Contact Number</label>
                    <input
                        type="text"
                        class="form-control"
                        name="contact_num"
                        placeholder="Contact Number"
                        value="{{$employee->contact_num}}"
                    />
                </div>
                <div class="form-group mb-2">
                    <label for="email_add">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email_add"
                        placeholder="Email Address"
                        value="{{$employee->email_add}}"
                    />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a type="submit" href="/" class="btn btn-primary">Back</a>
            </form>
        </div>
    </body>
</html>
