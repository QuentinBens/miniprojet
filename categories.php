<?php include "header.php";?>

<div class="container">

  <?php include "sidebar.php" ?>
    <?php $id = $_GET['id'];
    $categorie = getCategoriesDetailById($id,$linkDB);
    // $_GET est un tableau associatif déjà existant en php
    // ui permet dfe récupérer les variables transmises en URL
  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <?php echo $categorie['title']; ?>
        </div>
        <div class="panel-body" id="categoryFlex" >
          <h3>Description :</h3>
          <div >
            <p><?php echo $categorie['description'] ?></p>
            <img src="<?php echo $categorie['image'] ?>" alt="" />
          </div>

        </div>
      </div> <!--FIN panel-->
    </div> <!--FIN col-->
  </div> <!--FIN row-->


<?php include "footer.php" ?>
</div> <!--endContainer-->
