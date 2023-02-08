<div class="container py-4 mt-4">
        <h3 class="mb-4">Ajouter un objet</h3>
        <?php 
            if(isset($error)){
                if($error == -1){ ?>
                    <div class="alert alert-warning" role="alert">
                        Veuillez remplir les champs
                    </div>
                <?php }

                if($error == -2){ ?>
                        <div class="alert alert-danger" role="alert">
                            Veuillez entrer un prix valide
                        </div>
                <?php }

                if($error == -3){ ?>
                    <div class="alert alert-danger" role="alert">
                        Veuillez sélectionner une catégorie
                    </div>
                <?php }
            }
        ?>
       
        <form action="<?php echo site_url('objet/updatee/'.$id); ?>" method="get">
                <div class="mb-3">
                    <label for="titre" class="form-label">Nom de l'objet</label>
                    <input name="name" value="<?php echo $bout['name']; ?>" type="text" class="form-control" id="titre">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <input name="description" type="text" value="<?php echo $bout['description']; ?>" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
                </div>
                <div class="mb-3">
                        <select class="form-select w-75" name="cat" aria-label="Default select example">
                            <option selected value="">Select category</option>
                            <?php 
                                foreach($cat as $c){ ?>
                                    <option value="<?php echo $c['idCategory']; ?>"><?php echo $c['nom']; ?></option>
                                <?php }
                            ?>
                        </select>
                </div>
                <div class="d-flex align-items-center gap-4 mb-3">
                    <span>Prix estimatif : </span><input type="text" value="<?php echo $bout['estimation']; ?>"  class="form-control w-50" name="estimation" id="">
                    <button type="submit" class="btn btn-outline-primary">Ajouter</button>
                </div>
        </form>
    </div>