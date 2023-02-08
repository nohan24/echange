<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <style>
        body{
            min-height: 100vh;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        
        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
        
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }
        
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }
        
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <script defer src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script defer src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #f8f9fa;">
        <div class="container-fluid">
            <a href="<?php echo site_url('home/'); ?>" class="nav-link link-dark d-flex align-items-center mb-3 mb-md-0 me-md-auto">
                <img src="<?php echo base_url('assets/img/earth-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="40" height="32"></img>
                <span class="fs-4">Echange</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="nav nav-pills flex-row mb-auto">
                    <li>
                        <a href="<?php echo site_url('home/items'); ?>" class="nav-link link-dark">
                    <img src="<?php echo base_url('assets/img/forward-item-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="16" height="16"><img> Mes objets
                    </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('home/all'); ?>" class="nav-link link-dark">
                        <img src="<?php echo base_url('assets/img/list-filled-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="16" height="16"></img> Tous les objets
                    </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('home/demande'); ?>" class="nav-link link-dark">
                        <img src="<?php echo base_url('assets/img/cloud-notif-svgrepo-com.svg'); ?>" class="bi pe-none me-2" width="16" height="16"><img> Demande d'échange
                    </a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <form class="d-flex w-75" role="search" method="get" action="<?php echo site_url('home/search'); ?>">
                    <select class="form-select w-75" name="cat" aria-label="Default select example">
                        <option selected>Select category</option>
                        <?php 
                            foreach($cat as $c){ ?>
                                 <option value="<?php echo $c['idCategory']; ?>"><?php echo $c['nom']; ?></option>
                            <?php }
                        ?>
                    </select>
                    <input class="form-control ms-1 w-50" name="title" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-success ms-1" type="submit">Search</button>
                </form>
                <a class="btn btn-danger ms-1" href="<?php echo site_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </nav>