<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App - User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            @foreach ($register->images as $image)
                                            <img src="{{ asset('storage/profile_image/' . $image->profile_image) }}"
                                                class="img-radius profile-image" alt="User-Profile-Image">
                                            @endforeach
                                        </div>
                                        <h6 class="f-w-600">Welcome On Board!</h6>
                                        <p>{{$register->first_name}}</p>
                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">

                                    <div class="card-block">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="float-right mb-3">
                                            <a href="/userlist" class="btn btn-primary ">User List</a>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">User Profile</h6>

                                        <form method="POST" action="/editprofile/{{$register->id}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">First Name</p>
                                                    <input type="text" class="form-control" name="first_name"
                                                        placeholder="First Name" value="{{$register->first_name}}">

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Last Name</p>
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="Last Name" value="{{$register->last_name}}">
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Contact Details</h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Contact Number</p>
                                                    <input type="text" class="form-control" name="contact_num"
                                                        placeholder="Contact Number" value="{{$register->contact_num}}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Email Address</p>
                                                    <input type="email" class="form-control" name="email_add"
                                                        placeholder="Email Address" value="{{$register->email_add}}">
                                                </div>

                                                <div class="form-group">
                                                    <p class="m-b-10 f-w-600">Change Profile Picture</p>
                                                    <input type="file" class="form-control" name="profile_image[]"
                                                        multiple>

                                                    @foreach($register->images as $image)
                                                    <input type="hidden" {{ $imageNames[]=$image->profile_image }}>
                                                    @endforeach
                                                    <p>{{ implode(', ',$imageNames) }}</p>
                                                </div>

                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end  ">
                                                <button type="submit" class="btn btn-primary me-md-2">Update</button>
                                                <a href="/deleteprofile/{{$register->id}}"
                                                    class="btn btn-danger">Delete</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>