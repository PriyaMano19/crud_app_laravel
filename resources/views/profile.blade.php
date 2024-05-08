<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App - User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbMU_-W5j8_EwhEOvA8OAAbaZV1tydeHl94Q&s');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden;
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 10px;
            height: 500px;
            width: 800px;

        }

        .m-r-0 {
            margin-right: 0px;
        }

        .m-l-0 {
            margin-left: 0px;
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px;

        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#00308F), to(#6CB4EE));
            background: linear-gradient(to right, #6CB4EE, #00308F);
        }

        .user-profile {
            padding: 20px 0;
        }

        .card-block {
            padding: 5rem;
        }

        .m-b-25 {
            margin-bottom: 25px;
        }

        .img-radius {
            border-radius: 5px;
            max-width: 100px;
        }

        .btn-primary {
            background-color: #002D62;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        h6 {
            font-size: 14px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px;
            }
        }

        .card-block {
            padding: 1.25rem;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .card .card-block p {
            line-height: 25px;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .text-muted {
            color: #919aa3 !important;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .f-w-600 {
            font-weight: 600;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .user-card-full .social-link li {
            display: inline-block;
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .profile-image {
            width: 100px; 
            height: 100px; 
            object-fit: cover;
            border-radius: 50%; 
        }
    </style>
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
                                                <img src="{{ asset('storage/profile_image/' . $image->profile_image) }}" class="img-radius profile-image" alt="User-Profile-Image">
                                            @endforeach
                                        </div>
                                        
                                        <!-- <div class="m-b-25">
                                            <img src="{{ asset('storage/profile_image/' . $register->profile_image) }}" class="img-radius" alt="User-Profile-Image">

                                        </div> -->

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

                                        <form method="POST" action="/editprofile/{{$register->id}}">
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
                                                    <input type="file" class="form-control" name="profile_image[]"  multiple>

                                                            @foreach($register->images as $image)
                                                            <input type="hidden" {{ $imageNames[] = $image->profile_image }}>
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