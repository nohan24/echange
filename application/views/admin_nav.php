<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <title>Admin - Panel</title>
    <script defer src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #f8f9fa;">
        <div class="container-fluid">
            <a href="<?php echo site_url('admin/'); ?>" class="nav-link link-dark d-flex align-items-center mb-3 mb-md-0 me-md-auto">
                <img src="<?php echo base_url('assets/img/earth-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="40" height="32"></img>
                <span class="fs-4">Echange</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="margin-left: 50px;">
                <ul class="nav nav-pills flex-row mb-auto">
                    <li>
                        <a href="<?php echo site_url('admin/categories'); ?>" class="nav-link link-dark">
                            <img src="<?php echo base_url('assets/img/category-list-solid-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="16" height="16"><img> Catégories
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/stat'); ?>" class="nav-link link-dark">
                            <img src="<?php echo base_url('assets/img/stat-1-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="20" height="20"><img> Statistique
                        </a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-danger" href="<?php echo site_url('login/logout'); ?>">Logout</a>
        </div>
    </nav>

</body>

</html>