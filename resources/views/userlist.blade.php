<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App</title>
    <link rel="stylesheet" href="{{ asset('css/userlist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
</head>

<body>
   

        <div class="container mt-5 ml-5">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-3 col-xs-12">
                                    <h4 class="title">User <span>List</span></h4>
                                </div>
                              
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th  style="width:300px">Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Contact Number</th>
                                        <th>Email Address</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($register) > 0)
                                    @foreach ($register as $regi)
                                    <tr>
                                        <td></td>
                                        <td>  @foreach ($regi->images as $image)
                                                <img src="{{ asset('storage/profile_image/' . $image->profile_image) }}" class="img-radius profile-image" alt="User-Profile-Image">
                                            @endforeach
                                        </td>
                                        <td>{{ $regi->first_name}}</td>
                                        <td>{{ $regi->last_name }}</td>
                                        <td>{{ $regi->contact_num }}</td>
                                        <td>{{ $regi->email_add }}</td>
                                        <!-- <td>
                                            <ul class="action-list">
                                                <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4">No Data</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="panel-footer">
                            <div class="row">
                                <div class="col col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div>
                                <div class="col-sm-6 col-xs-6">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="#">
                                                << /a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">></a></li>
                                    </ul>
                                    <ul class="pagination visible-xs pull-right">
                                        <li><a href="#">
                                                << /a>
                                        </li>
                                        <li><a href="#">></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
   
</body>

</html>