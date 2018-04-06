<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin">Admin Panel</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $title?></li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-edit"></i>
                        </div>
                        <div class="mr-5">It`s time to add new post!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/admin/add_post">
                        <span class="float-left">Add New Post</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> All Posts Table</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Machine name</th>
                            <th>Publish date</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Machine name</th>
                            <th>Publish date</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['title'] ?></td>
                            <td><?php echo $post['machine_name'] ?></td>
                            <td><?php echo $post['date'] ?></td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm" href="<?php echo $post['delete'] ?>">Delete</a>
                                <a class="btn btn-outline-success btn-sm" href="<?php echo $post['edit'] ?>">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>