<?php 
    session_start();
    
    var_dump($_REQUEST);

    $contacts = isset($_SESSION['contacts'])  ?  $_SESSION['contacts'] : [] ;
    $target_dir = "uploads/";
    $image = $target_dir.'example.png';
    
    if(!empty($_FILES['image'])) {
        $fileType = $_FILES['image']['type'];
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if(in_array($fileType, $allowedTypes)) {
            if($_FILES['image']["size"] < 400000) {
                if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                    $fileExtension = $fileType == 'image/jpeg' || $fileType == 'image/jpg' ? '.jpg' : '.png';
                    $newFileName = $target_dir . $_REQUEST['titolo'] . '-' . $_REQUEST['autore'] . $fileExtension;
                    if(move_uploaded_file($_FILES['image']["tmp_name"], $newFileName)) {
                        $image = $newFileName;
                        echo 'Caricamento avvenuto con successo';
                    } else {
                        echo 'Errore!!!';
                    }
                }
            } else {
                echo 'FileSize troppo grande';
            }
        } else {
            echo 'FileType non supportato';
        }
    }
    
    // fare i controlli di validazione dei campi
    $regexanno = '/(?:([+]\d{1,4})[-.\s]?)?(?:[(](\d{1,3})[)][-.\s]?)?(\d{1,4})[-.\s]?(\d{1,4})[-.\s]?(\d{1,9})/';
    preg_match_all($regexanno, htmlspecialchars($_REQUEST['anno']), $matches, PREG_SET_ORDER, 0);
    $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
    
    $titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
    $autore = strlen(trim(htmlspecialchars($_REQUEST['autore']))) > 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
    $anno = $matches ? htmlspecialchars($_REQUEST['anno']) : exit();
    $genere = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();
    
    $contact = [
        'Titolo' => $titolo, 
        'Autore' => $autore, 
        'Anno' => $anno,  
        'Genere' => $genere, 
        'Image' => $image
    ];
    
    $_SESSION['contacts'] = [...$contacts, $contact];
    
    session_write_close();
    
    exit(header('Location: http://localhost/Giorno-1_PHP_TEORIA/ProgettoSettimanale/'));
    ?>