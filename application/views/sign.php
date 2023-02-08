<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form.css'); ?>">
    <title>S'inscrire</title>
</head>

<body>
    <div class="container" id="cont">
        <h2>Inscription</h2>

        <?php 
            if(isset($error)){
                
                if($error == 1){ ?>
                    <div class="alert alert-warning" role="alert">
                        Veuillez remplir les champs
                    </div>
                <?php }

                if($error == 2){ ?>
                        <div class="alert alert-danger" role="alert">
                            Veuillez entrer un email valide
                        </div>
                <?php }
            }
        ?>

        <form action="<?php echo site_url('login/useradd'); ?>" method="post">
            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input name="mail" type="text" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="youremail@gmail.com">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input name="nom" type="text" class="form-control" id="nom" placeholder="yourname">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Mot de passe</label>
                <input name="pwd" type="password" class="form-control" id="pwd">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">S'inscrire</button>
                <a href="<?php echo site_url('login/admin'); ?>" class="btn btn-primary">Admin Panel</a>
                <a href="<?php echo site_url('login/'); ?>" class="btn btn-primary">User Panel</a>
            </div>
        </form>
    </div>
</body>

</html>