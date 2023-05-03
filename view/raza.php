<main>
    <img class="imgRaza" src="<?=$dataToView->getImg()?>">
    <h1><?php echo $dataToView->getNombre()?></h1>
    <p><?php echo $dataToView->getDescripcion()?></p>
    <br>
    <h2><span>Media de vida: </span><?php echo $dataToView->getMediaVida();?></h2>
    <br>
    <h2><span>Dado de vida: </span><?php echo $dataToView->getDado();?></h2><br>
    <h2><span>Habilidad racial: </span><?php echo $dataToView->getHabilidad();?></h2><br>
    <h2><span>Idioma natal: </span><?php echo $dataToView->getIdioma()?></h2>
    <br>
    <br>
    <h1>Origenes</h1><br>
    <section>
    <?php
        $origenes=$dataToView->getOrigenes();
    ?>
    <br>
    <?php
    for($i=0;$i<count($origenes);$i++){
    ?>
    <h1><?php echo $origenes[$i]->getNombre()?></h1>
    <p><?php echo $origenes[$i]->getDescripcion()?></p>
    <br>
    <?php 
    if($origenes[$i]->getMediaVida()!=null){
        ?>
    <h2><span>Media de vida: </span><?php echo $origenes[$i]->getMediaVida();?></h2>
    <?php }?>
    <br>
    <?php 
    if($origenes[$i]->getDado()!=null){
        ?>
    <h2><span>Dado de vida: </span><?php echo $origenes[$i]->getDado();?></h2><br>
    <?php }?>
    <h2><span>Habilidad racial: </span><?php echo $origenes[$i]->getHabilidad();?></h2><br>
    <?php
    }
    ?>
    </section>
</main>