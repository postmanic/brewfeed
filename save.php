<?php


require_once('fnc/solo.inc.php');
require_once('fnc/dbhandler.fnc.php');



      $id = $_REQUEST['id'];
      $value = $_REQUEST['value'];
      $pieces = explode("_", $id);
      
      $conn = DBH::opretForbindelse();
      $conn->autocommit(FALSE);
      $query = "UPDATE {$pieces[0]} SET {$pieces[1]}= '$value' WHERE {$pieces[2]} = '{$pieces[3]}'";
      $results = @$conn->query($query);
             
      $conn->commit();   
      echo $_REQUEST["value"];
?>
