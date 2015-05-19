<?php
$files = array(
   'data.db',
);

foreach($files as $file) {
    if(file_exists($file))
        echo $file, ' found<br/>';
    else
        echo $file, ' not found!<br/>';
    try {
        $db = new PDO('sqlite:' . $file);
        if($db)
            echo 'connection to ', $file, ' made succesfully<br/>';
    } catch (PDOException $error) {
        echo 'error connecting to ', $file, ' error message: ', $error->getMessage(), '<br/>';
    }
    $db = null;
}