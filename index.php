<?php
require_once('config.php');
require_once('function.php');

require_once('head.php');
include_once('navbar.php');

// salvo, se presenti, gli album presenti nel DB
$libri=getAllAlbum();

?>


<div class='container'>
    <div class='text-center'>
        <h1>Libriamo</h1>
        <p>Inserisci i dati qui:</p>
    </div>

    


    <form method='POST' action="controller.php?action=addAlbum" enctype="multipart/form-data" >

        <div class='row g-3 d-flex flex-column' >    
            <div class="mb-4 col">
                <input type="text" class="form-control" placeholder='Titolo...' name='title'>
            </div>
            <div class="mb-4 col">
                <input type="text" class="form-control" placeholder='Autore...' name='artist'>
            </div>
            <div class="mb-4 col">
                <input type="number" class="form-control" placeholder='Anno di uscita...' name='year'>
            </div>
            <div class="mb-4 col">
                <input type="text" class="form-control" placeholder='Genere...' name='genre'>
            </div>
            
        </div>
        <div class='row g-3'>
        <div class="mb-3 col-auto">
                <input type="file" class="form-control" placeholder='Upload the cover' name='cover'>
            </div>
            <div class="mb-3 col-auto">
            <button type="submit" class="btn btn-outline-dark">Submit</button>
            </div>
        </div>
    
    </form>


    <table class="table table-dark table-stripped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Copertina</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col">Anno di uscita</th>
                <th scope="col">Genere</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
                
                </tr>
            </thead>
            <tbody>
            <?php if(!$libri) { ?>  
        <h2 class='text-center'>Sembra che la tua libreria sia vuota! <br> Inserisci i dati e clicca su Submit per salvarli</h2>
    <?php } else { ?>
        <ul class="list-unstyled">
            <?php foreach($libri as $libro) {
                $src = $libro['cover'] ? $libro['cover'] : $defaultCover;
            ?>
                
                
                <tr>
                    <th scope="row"><?= $libro['id']+1 ?></th>
                    <td><img src=<?= $libro['cover'] ?> width="100" ></td>
                    <td><?= $libro['title'] ?></td>
                    <td><?= $libro['artist'] ?></td>
                    <td><?= $libro['year'] ?></td>
                    <td><?= $libro['genre'] ?></td>
                    <td><a href="updateAlbum.php?id=<?=$libro['id']?> " class='btn btn-outline-warning'>Modifica</a></td>
                    <td><a href="controller.php?action=delete&id=<?=$libro['id']?> " class='btn btn-outline-danger'>Elimina</a></td>

                    
                    
                </tr>
                
                <?php }} ?>
               
            </tbody>
        </table>








<!-- 
    <div>
    <?php if(!$libri) { ?>  
        <h2 class='text-center'>Sembra che la tua libreria sia vuota! <br> Inserisci i dati e clicca su Submit per salvarli</h2>
    <?php } else { ?>
        <ul class="list-unstyled">
            <?php foreach($libri as $libro) {
                $src = $libro['cover'] ? $libro['cover'] : $defaultCover;
            ?>
                <li class="mb-3">
                    <div class="d-flex flex-wrap align-items-center">
                        <img src="<?=$src?>" alt="libroCover" class='img-fluid mb-2' style="max-width: 200px;">
                        <div class="text-center d-flex">
                            <p class='fs-4 fw-bold m-0'><?=$libro['title']?></p>
                            <p class='fs-5 fw-semibold m-0'><?=$libro['artist']?></p>
                            <p class='fs-6 m-0'>Anno di uscita <?=$libro['year']?></p>
                            <p class='fs-6 m-0'>Genre: <?=$libro['genre']?></p>
                        </div> 
                        <div class="mt-2">
                            <a href="updateAlbum.php?id=<?=$libro['id']?>" class='btn btn-outline-warning'><i class="bi bi-pencil-square"></i> Modifica</a>
                            <a href="controller.php?action=delete&id=<?=$libro['id']?>" class='btn btn-outline-danger'><i class="bi bi-trash3"></i> Elimina</a>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>

 -->























<?php
require_once('footer.php');
?>