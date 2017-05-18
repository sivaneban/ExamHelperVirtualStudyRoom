<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ExamHelper - Main Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="adminCSS/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="adminCSS/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="adminCSS/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="adminCSS/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="adminCSS/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="adminCSS/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">AdminDetailsPage</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a style="color: #449d44" href="#"><i  class="fa fa-home fa-fw"></i> AdminHomePage</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> User <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Select Courses Or Modules </h1>
                </div>
                <a  class="h3" href="#">To Add A New Course Or A Module- To be Develop</a>
                <form class="" action="/adminQuestion" method="post" >
                    {{csrf_field()}}
                    <div class="input-group custom-search-form">
                    <select class="form-control" name="coursename"  >
                        <!--<option selected disabled>Route ID</option>-->
                        @foreach($courses as $course)
                            {{--<option value="{{$departure->route_id}}">--}}
                            <option>
                                {{$course->course_name}}
                            </option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                    <input type="submit"  name="search" value="Select"  class="btn btn-primary">
                    </span>
                    </div>
                </form>

            </div>
            <h1 class="page-header">User Control</h1>
            <table>
                <tr><td width="150px"><h3>User ID</h3></td><td width="150px"><h3>User Name</h3></td><td width="150px"><h3>Faculty</h3></td><td width="150px"><h3>Department</h3></td><td width="150px"><h3>Options</h3></td> </tr>


                @foreach($users as $users)
                    <form class="" role="form" action="/activate" method="post">
                        <!--            --><?php

                        $u_name=$users->UserName;
                        $u_status=$users->status;
                        $u_id=$users->UserID;
                        $u_faculty=$users->Faculty;
                        $u_department=$users->Department;
                        ?>
                        <input type="hidden" class="form-control" name="u_id" value="{{$users->UserID}}">
                        <input type="hidden" class="form-control" name="u_status" value="{{$users->status}}">
                        <tr><td><h4><?php echo $u_id ?></h4></td>
                            <td><h4><?php echo $u_name ?></h4></td>
                            <td><h4><?php echo $u_faculty ?></h4></td>
                            <td><h4><?php echo $u_department ?></h4></td>

                            @if ($u_status=="a")
                                {{csrf_field()}}
                                <td> <button type="submit" class="btn btn-success">Suspend</button></td></tr>

                        @else
                            {{csrf_field()}}
                            <td><button type="submit" class="btn btn-success">Activate</button></td></tr>
                        @endif


                    </form>
                @endforeach


            </table>


            <!-- ... Your content goes here ... -->

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
