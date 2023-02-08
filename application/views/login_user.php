<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form.css'); ?>">
    <title>Se connecter</title>
</head>

<body>
    <div class="container" id="cont">
        <h2>Se connecter en tant qu'utilisateur</h2>

        <?php 
            if(isset($error)){

                if($error == 0){ ?>
                    <div class="alert alert-success" role="alert">
                        Inscription réussi, veuillez vous connectez !
                    </div>
                <?php }

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

                if($error == 3){ ?>
                    <div class="alert alert-danger" role="alert">
                        L'email ou le mot de passe est incorrect
                    </div>
                <?php }
            }
        ?>

        <form action="<?php echo site_url('login/userlog'); ?>" method="post">
            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input name="mail" type="text" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="youremail@gmail.com">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Mot de passe</label>
                <input name="pwd" type="password" class="form-control" id="pwd">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Se Connecter</button>
                <a href="<?php echo site_url('login/inscription'); ?>" class="btn btn-outline-primary">S'inscrire</a>
                <a href="<?php echo site_url('login/admin'); ?>" class="btn btn-primary">Admin Panel</a>
            </div>
        </form>
    </div>
</body>

</html>