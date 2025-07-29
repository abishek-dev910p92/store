<?php 
if ($_SERVER['HTTP_HOST'] == 'localhost'){
    include 'local_db.php';
}
else{
    include 'live_db.php';
}

 ?> 