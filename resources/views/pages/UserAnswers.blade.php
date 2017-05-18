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
            <a style="color: #449d44" class="navbar-brand" href="#">AdminAnswersPage</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="/admin"><i class="fa fa-home fa-fw"></i> AdminHomePage</a></li>
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

            <h3 class="page-header" >Answers for the Question : <?php echo $question ?></h3>
            <h3>Give Your Answers Here</h3>
            <form class="" role="form" action="/adminNewAnswer" method="post">


                <textarea name="ans" id="pass" rows="4" cols="100">
                    Type your answer here.
                </textarea>
                <input type="hidden" class="" name="q_id" value="{{$question_id}}">
                    {{csrf_field()}}
                <input type="submit"  name="post" value="Post"  class="btn btn-primary">
            </form>


            @foreach($answers as $answer)
                <form class="" role="form" action="/adminAnswers" method="post">
                    <?php
                    //$ans_id=$answer->answer_index;
                    //$q_id=$answer->question_id;
                    $ans_content=$answer->answer_content;
                    $ans_status=$answer->status
                    ?>

                    <h4>Given Answer</h4>
                    <p><?php echo $ans_content ?></p>

                    @if ($ans_status=="a")
                        {{csrf_field()}}
                        <tr><td> <input type="submit"  name="block" value="Block"  class="btn btn-primary"></td>

                    @else
                        {{csrf_field()}}
                        <tr><td><input type="submit"  name="activate" value="Activate"  class="btn btn-primary"></td>
                    @endif
                            <td><input type="submit"  name="approve" value="Approve Or Dissagree"  class="btn btn-primary"></td></tr>

                </form>
        @endforeach
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
