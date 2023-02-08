<div class="container w-50 mt-4">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner rounded">
            <?php 
                foreach($img as $i){ ?>
            <div class="carousel-item active">
            <div class="bd-placeholder-img card-img-top" style="background-repeat:no-repeat;background-size:cover;background-position:center;width:100%;height:500px;background-image:url('<?php echo base_url("assets/img/objets/".$i['idObject'])."/".$i['src']; ?>')"></div>
            </div>
            <?php }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div>
</div>
<div class="container d-flex justify-content-center mt-3">
    <div class="card w-100" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $item['name']; ?>
            </h5>
            <p class="card-text">
                <?php echo $item['description']; ?>
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Owner : </b>
                <?php echo $item['pseudo']; ?>
            </li>
            <li class="list-group-item"><b>Estimation : </b>
                <?php echo $item['estimation']; ?> Ariary</li>
        </ul>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Echanger
</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Vos objets</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 w-100">
                                <?php 
                                    foreach($objects as $o){ ?>
                                    <div class="d-flex justify-content-between p-3 w-100 border rounded echange">
                                            <div>
                                                <?php echo $o['name']; ?>
                                            </div>
                                            <div>
                                                <?php  
                                                    echo difPourcent($item['estimation'],$o['estimation']);
                                                ?>
                                            <a href="<?php echo site_url('objet/ask/'.$o['idObject'].'/'.$obj); ?>" class="btn btn-success">Ask</a>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                               
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>