<div class="container mt-4">
    <?php 
        if(isset($_GET['err']) == 1){ ?>
            <div class="alert alert-warning" role="alert">
                Veuillez mettre une image de couverture
            </div>
        <?php }
    ?>
    <form action="<?php echo site_url('objet/g/'.$_GET['idimg']); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image de fond</label>
            <input class="form-control" name="img0" type="file" id="formFileMultiple">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image additionnelle</label>
            <input class="form-control" name="img1" type="file" id="formFileMultiple">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image additionnelle</label>
            <input class="form-control" name="img2" type="file" id="formFileMultiple">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image additionnelle</label>
            <input class="form-control" name="img3" type="file" id="formFileMultiple">
        </div>
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
    </form>
</div>