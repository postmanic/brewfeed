<?php

    // Opret bryg
    // Input skal renses for injection.

    $name = $_REQUEST['brygnavn'];
    $email = $_REQUEST['useremail'];
    $brygget = $_REQUEST['brygget'];
    $stilart = $_REQUEST['stilart'];
    $beskrivelse = $_REQUEST['beskrivelse'];
    $og = $_REQUEST['og'];
    $fg = $_REQUEST['fg'];
    $alk = $_REQUEST['alk'];
    $ibu = $_REQUEST['ibu'];
    $ebc = $_REQUEST['ebc'];

    
    
      
   $conn = DBH::opretForbindelse();

//try
//    {
    

      $conn->autocommit(FALSE);          
      
      // Hvis Ja
      //      --> Check hvor mange øl email har registreret inden for en periode
      //      Hvis inden for begrænsning 
      //                            --> Insert øl med tilhørende brugerid.
      //      Ellers
      //                            --> Giv bruger meddelse om at der ikke kan oprettes flere bryg inden for perioden.
      // 
      // Ellers
      //      --> Opret email bruger
      //      --> Insert øl med brugerid
      //              

      $query = "INSERT INTO beer (beername, userid, brygget, stilart, beskrivelse, og, fg, alk, ibu, ebc) VALUES ('".$name."', '".$userid."', '".$brygget."', '".$stilart."', '".$beskrivelse."','".$og."', '".$fg."', '".$alk."', '".$ibu."', '".$ebc."')";
      $results = $conn->query($query);
      $beerid = $conn->insert_id;
      $uid = md5($beerid.$userid);
      $query = "UPDATE beer SET uid= '$uid' WHERE table_beerid = '$beerid'";
      $results = $conn->query($query);
             
      $conn->commit();
      
      
      
      
      
      
      


      // Send bekræftelses email til bruger med aktiveringslink    

//    }
    
//    catch (Exception $e)
//  
 //   {
 //     if (isset($conn))
 //       $conn->close();
 //     throw $e;
 //   }




echo  <<<HTML_OUT

<meta http-equiv="refresh" content="0;url=index.php?page=brygger.php">

HTML_OUT;

?>