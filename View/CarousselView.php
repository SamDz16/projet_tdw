<style>
    *{
        box-sizing: border-box;
    }
    #diapo-images{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap: 20px;
    }
    #diapo-images img{
        width: 250px;
        border-radius: 5px;
    }
    #img-details{
        display: flex;
        flex-direction: row;
    }
</style>

<?php


class CarousselView
{
    public function display_caroussel($diaporama_images)
    {
        ?>
        <div style="width: 85%; margin: 20px auto;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>

                <div class="carousel-inner">
                    <?php
                    $i =1;
                    while($diaporama_image = $diaporama_images->fetch()){
                        ?>
                            <div class="carousel-item <?php if ($i === 1) echo "active" ?>">
                                <img style="height: 350px;" src="static/img/<?=$diaporama_image["image_diapo"]?>" class="d-block w-100" alt="...">
                            </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <?php
    }

    public function display_dispo_images($diaporama_images)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Images du Diaporama: </h3>
            <div id="diapo-images" style="padding: 10px;">
                <?php
                while($diaporama_image = $diaporama_images->fetch()){
                    ?>
                    <div>
                        <img src="static/img/<?=$diaporama_image["image_diapo"]?>" alt=<?=$diaporama_image["image_diapo"]?>>
                        <div id="img-details">
                            <p style="margin: 3px 7px 3px 0;"><small><?=$diaporama_image["image_diapo"]?></small> - </p>
                            <p style="margin: 3px 0;"><small><?php ($diaporama_image["is_in_diapo"]) ? print "Diapo: OUI" : print "Diapo: NON" ?></small></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }

    public function add_diapo_image_form()
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Ajouter Image: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                    <div style="margin: 20px 0;" class="form-group green-border-focus col">
                        <label for="add_image_diapo">Veuillez introduire le nom de l'image</label>
                        <input type="text" name="add_image_diapo" class="form-control" id="add_image_diapo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter Image</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function modify_diapo_image_form($diaporama_images)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Modifier Image: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                   <div class="row">
                       <div class="form-group col">
                           <label for="modify_image_diapo">Veuillez choisir l'image à modifier':</label>
                           <select id="modify_image_diapo" name="modify_image_diapo" class="form-select" aria-label="Default select example">
                               <?php
                               while($diaporama_image = $diaporama_images->fetch()){
                                   ?>
                                   <option value=<?= $diaporama_image["image_diapo"]?>><?="Image: ". $diaporama_image["image_diapo"]?></option>
                                   <?php
                               }
                               ?>
                           </select>
                       </div>
                       <?php
                       require_once ("Model/DiaporamaModel.php");
                       $diapo = new DiaporamaModel();
                       $diaporama_images = $diapo->fetchNoDiaporamaImages();
                       ?>
                       <div class="form-group col">
                           <label for="modified_image_diapo">Veuillez choisir la nouvelle image:</label>
                           <select id="modified_image_diapo" name="modified_image_diapo" class="form-select" aria-label="Default select example">
                               <?php
                               while($diaporama_image = $diaporama_images->fetch()){
                                   ?>
                                   <option value=<?= $diaporama_image["image_diapo"]?>><?="Image: ". $diaporama_image["image_diapo"]?></option>
                                   <?php
                               }
                               ?>
                           </select>
                       </div>
                   </div>
                    <button style="margin-top: 20px;" type="submit" class="btn btn-success">Modifier Image</button>
                </form>
            </div>
        </div>
        <?php
    }

    public function delete_diapo_image_form($no_diaporama_images)
    {
        ?>
        <div style="border: 1px solid #000; border-radius: 5px; padding: 20px; margin: 20px 0;">
            <h3 style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Supprimer Image: </h3>
            <div style="padding: 10px;">
                <form method="post" action="loginMaster.php" enctype="multipart/form-data">
                   <div class="form-group ">
                       <label for="delete_image_diapo">Veuillez choisir l'image à supprimer':</label>
                       <select id="delete_image_diapo" name="delete_image_diapo" class="form-select" aria-label="Default select example">
                           <?php
                           while($no_diaporama_image = $no_diaporama_images->fetch()){
                               ?>
                               <option value=<?= $no_diaporama_image["image_diapo"]?>><?="Image: ". $no_diaporama_image["image_diapo"]?></option>
                               <?php
                           }
                           ?>
                       </select>
                   </div>

                    <button style="margin-top: 20px;" type="submit" class="btn btn-danger">Modifier Image</button>
                </form>
            </div>
        </div>
        <?php
    }

}