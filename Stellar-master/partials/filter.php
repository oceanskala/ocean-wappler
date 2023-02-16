<?php
require "db.php";

if(isset($_GET["active"])){
    $activated = $_GET["active"];
    $del = $db->prepare("UPDATE smartContracts SET activated=?"); 
    $check=$del->execute([0]);

    if($check){
        $sorgu = $db->prepare("UPDATE smartContracts SET activated=? WHERE id=?"); 
        $sorgu->execute([1,$activated]);

        header('Location: ../..' . $_GET["back"]);

    }
}
?>