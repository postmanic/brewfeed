<?php

/**
 *
 * www.pigit.dk
 * 
 * dbhandler.fnc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2005
 *
 **/


// Inkluderer database inforamtion med reqire_once, hvis filen er inkluderet et andet sted giver det ikke en fejl.
    


// DBH håndterer vores forbindelse.
// Der vil kun blive oprettet forbindelse en gang, uanset hvor mange gange den kaldes.
// Det er ikke nødvendigt at lukke forbindelsen, det gør PHP for os ved script stop.

class DBH
{
  private static $s_forb;
  
  public static function opretForbindelse()
  {
    if (DBH::$s_forb === NULL)
      {
        $forb = @new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno() !== 0)
          {
            $fejl = mysqli_connect_error();
            throw new DatabaseFejlException($fejl);
          }    
      $forb->query('SET NAMES \'utf8\'');
        DBH::$s_forb = $forb;
      }
    return DBH::$s_forb;
  }  

}    
  
?>