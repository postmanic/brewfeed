<?php

/**
 *
 * BrewFeed
 * 
 * filename: dbhandler.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

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