<div class="mb-3 d-flex flex-column m-auto py-5 align-items-center justify-content-center">
    <h3 class="mb-5">Ajouter une catégorie</h3>
    <form class="row g-3" method="get" action="<?php echo site_url('admin/traitement_add'); ?>">
        <div class="col-auto">
            <input type="text" name="cat" class="form-control" id="cat">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        </div>
    </form>
</div>