<?php
require_once('config.php');
require_once('function.php');

require_once('head.php');
include_once('navbar.php');

// salvo, se presenti, gli album presenti nel DB
$libro=getAlbumByID($_GET['id']);

?>

<div class="container  p-5">
    <div class='text-center'>
        <h1>Libriamo</h1>
        <p>Inserisci i tuoi libri qui</p>
    </div>

    <form method='POST' action="controller.php?action=updateAlbum&id=<?php echo htmlspecialchars($_GET['id']); ?>" enctype="multipart/form-data">
        <div class='row g-3 d-flex flex-column' >    
            <div class="mb-4 col">
                <input type="text" class="form-control" placeholder='Titolo...' name='title' value="<?php echo htmlspecialchars($libro['title']); ?>">
            </div>
            <div class="mb-4 col">
                <input type="text" class="form-control" placeholder='Autore...' name='artist' value="<?php echo htmlspecialchars($libro['artist']); ?>">
            </div>
            <div class="mb-4 col">
                <input type="number" class="form-control" placeholder='Anno di uscita...' name='year' value="<?php echo htmlspecialchars($libro['year']); ?>">
            </div>
            <div class="mb-4 col">
                <input type="text" class="form-control" placeholder='Genere...' name='genre' value="<?php echo htmlspecialchars($libro['genre']); ?>">
            </div>
        </div>
        <div class="mb-3">
    <label>Current Cover:</label>
    <img src="<?php echo htmlspecialchars($libro['cover']); ?>" alt="Current Cover" style="width: 100px; height: auto;">
</div>
        <div class='row g-3'>
            <div class="mb-3 col-auto">
                <input type="file" class="form-control" placeholder='Upload the cover' name='cover' >
            </div>
            <div class="mb-3 col-auto">
                <button type="submit" class="btn btn-outline-dark">Submit</button>
            </div>
        </div>
    </form>
</div>





















<?php
require_once('footer.php');
?>