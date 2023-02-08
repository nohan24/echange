<div class="d-flex flex-column w-75 container mb-3 p-3">
    <a href="<?php echo site_url('admin/add_category'); ?>"  class="w-25 mb-4 m-auto btn btn-success">Ajouter une catégorie +</a>
    <?php 
        if(count($categories) == 0){ ?>
            <p class="text-center p-4">Pas de catégories</p>
        <?php }
    ?>
    <ul class="list-group list-group-flush">
        <?php 
            foreach($categories as $cat){ ?>
                <li class="border d-flex align-center justify-content-between list-group-item"><span class="d-flex align-items-center"><?php echo $cat['nom']; ?></span><a class="btn btn-outline-danger" href="<?php echo site_url('admin/delete/'.$cat['idCategory']); ?>"> Delete </a></li>
            <?php }
        ?>
    </ul>
</div>