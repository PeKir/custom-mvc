<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="/resources/templates/libs/bootstrap/css/bootstrap.min.css"
          rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/resources/templates/libs/font-awesome/css/font-awesome.min.css"
          rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/resources/templates/libs/datatables/dataTables.bootstrap4.css"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/resources/templates/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Include Editor style. -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.min.css'
          rel='stylesheet' type='text/css'/>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css'
          rel='stylesheet' type='text/css'/>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/admin">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button"
            data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right"
                title="Dashboard">
                <a class="nav-link" href="/admin">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Admin Panel</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right"
                title="Posts">
                <a class="nav-link nav-link-collapse collapsed"
                   data-toggle="collapse" href="#collapseExamplePages"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Posts</span>
                </a>
                <ul class="sidenav-second-level collapse"
                    id="collapseExamplePages">
                    <li>
                        <a href="/admin/add_post">Add New Post</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right"
                title="Users">
                <a class="nav-link nav-link-collapse collapsed"
                   data-toggle="collapse" href="#collapseComponents"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Users</span>
                </a>
                <ul class="sidenav-second-level collapse"
                    id="collapseComponents">
                    <li>
                        <a href="#">Coming Soon</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fa fa-fw fa-sign-out"></i>Blog Main Page</a>
            </li>
        </ul>
    </div>
</nav>

<!--Content-->
<?php echo $content ?>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Your Website 2018</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Bootstrap core JavaScript-->
<script src="/resources/templates/libs/jquery/jquery.min.js"></script>
<script src="/resources/templates/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/resources/templates/libs/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="/resources/templates/libs/datatables/jquery.dataTables.js"></script>
<script src="/resources/templates/libs/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/resources/templates/admin/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/resources/templates/admin/js/sb-admin-datatables.min.js"></script>
<!-- Include JS file. -->
<script type='text/javascript'
        src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/js/froala_editor.min.js'></script>
<script type="text/javascript"
        src="/resources/templates/admin/js/add_foral_editor.js"></script>
</div>
</body>

</html>