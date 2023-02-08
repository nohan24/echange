<main>
    <?php 
        if($link == 'modif'){ ?>
            <a href="<?php echo site_url('objet/addObject'); ?>" class="btn btn-outline-success mb-4">Ajouter un objet +</a>
        <?php }
    ?>
    <?php 
        if(count($objects) > 0){ ?>
             <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php 
                    foreach($objects as $o){ ?>
                            <div class="col">
                                <div class="card shadow-sm" style="height: 550px;">
                                    <div class="bd-placeholder-img card-img-top" style="background-repeat:no-repeat;background-size:cover;background-position:center;width:100%;height:350px;background-image:url('<?php echo base_url("assets/img/objets/".$o['idObject'])."/".$o['src']; ?>')"></div>
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h4><?php echo $o['name']; ?></h4>
                                            <p class="card-text" style="font-size: 14px; color: #4444449d;"><?php echo $o['description']; ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <?php 
                                                    if($link == 'modif'){ ?>
                                                        <a href="<?php echo site_url('home/update/'.$o['idObject']); ?>" class="btn btn-sm btn-outline-secondary"><?php echo $in; ?></a>

                                                    <?php }else{ ?>
                                                        <a href="<?php echo site_url('home/' . $link . '/'.$o['idObject']); ?>" class="btn btn-sm btn-outline-secondary"><?php echo $in; ?></a>
                                                    <?php }
                                                ?>
                                                <a href="<?php echo site_url('home/history/'.$o['idObject']); ?>" class="btn btn-sm btn-outline-secondary">Historique</a>
                                            </div>
                                                <small class="text-muted"><?php echo $o['estimation']; ?> Ariary</small>
                                            </div>
                                        </div>
                                        <div class="p-3">
                                           <span>Owner : <?php echo $o['pseudo']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
            <p class="p-5 text-center">Vous n'avez pas d'objet</p>
        <?php }
    ?>
</main>