<?php 

function getAllAlbum () {
    global $mysqli;
    $result = []; // Inizializza $result come array vuoto
    $sql = 'SELECT * FROM libri';
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
    }
    return $result; // Ora $result è sempre definita, anche se vuota
}


function addAlbum ($albumTitle, $albumArtist, $albumYear, $albumGenre, $albumCover) {
    global $mysqli;
    $sql = "INSERT INTO libri (title, artist, year, genre, cover) 
    VALUES ('$albumTitle', '$albumArtist', '$albumYear', '$albumGenre', '$albumCover');";
if (!$mysqli->query($sql)) {
echo ($mysqli->connect_error);
} else {
echo 'Record aggiunto con successo!!!';
exit(header('Location: http://localhost/Giorno-1_PHP_TEORIA/ProgettoSettimanale/'));
}
}

function deleteAlbum($id) {
    global $mysqli;
    $sql='DELETE FROM libri WHERE id='.$_REQUEST['id'];
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
        } else {
        echo 'Record eliminato con successo!!!';
        exit(header('Location: http://localhost/Giorno-1_PHP_TEORIA/ProgettoSettimanale/'));
        }
}


function getAlbumByID ($id) {
    global $mysqli;
    $sql='SELECT * FROM libri WHERE id='.$id;
    $res= $mysqli->query($sql);
    if($res) {
        $result=$res->fetch_assoc();
    }
return $result;
}