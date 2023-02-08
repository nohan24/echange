<div class="container w-100 d-flex flex-column py-4 justify-content-center align-items-center">
    <div class="mb-3">
        <h2 class="text-center">Historique d'échange</h2>

    </div>
    <?php 
        foreach($hist as $h){ ?>
            <div class="mb-3 w-100">
                <div class="d-flex justify-content-between p-3 w-100 border rounded echange">
                    
                    <div><?php 
                        if($idPr == $h['ore']){ ?>
                        <?php echo $h['receveur']; ?> <img src="<?php echo base_url('assets/img/arrow-end-svgrepo-com.svg'); ?>" width=16 height=16 alt=""> <?php echo $h['envoyeur']; ?> 
                            
                        <?php }else{ ?>
                            <?php echo $h['envoyeur']; ?> <img src="<?php echo base_url('assets/img/arrow-end-svgrepo-com.svg'); ?>" width=16 height=16 alt=""> <?php echo $h['receveur']; ?>
                        <?php }
                    ?></div>
                    <div class="date"><?php echo $h['daty']; ?></div>
                </div>
            </div>
        <?php }
    ?>

</div>