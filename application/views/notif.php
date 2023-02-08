<div class="container mt-5">
    <?php 
        foreach($notif as $n){ ?>
            <div class="mb-3 w-100">
                <div class="d-flex justify-content-between align-items-center p-3 w-100 border rounded echange">
                    <div>
                        <span>Demande de : <?php echo $n['envoyeur']; ?></span><br>
                        <span>Echange de votre <?php echo $n['objDemande'] ?> - <?php echo $n['objetEnvoyer']; ?> estimé à <?php echo $n['estimation'];?> Ariary</span>
                    </div>
                    <div><a href="<?php echo site_url('home/confirm/'.$n['envi'].'/'.$n['reci']); ?>" class="btn btn-outline-success">Accepter l'échange</a><a href="<?php echo site_url('home/dropnotif/'.$n['idNotif']); ?>" class="btn btn-danger ms-1">Decliner</a></div>
                </div>
            </div>
        <?php }
    ?>
   
</div>