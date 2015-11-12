<?php

/**
 *
 * BrewFeed
 * 
 * filename: brew_manager.inc.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

 
class BrewManager
{
  public $id;  
  public $name;
  public $stilart;
  public $og;
  public $fg;
  public $febc;
  public $eebc;
  public $bebcd;
    
    
  // TODO 2 -o LRJ GITHUB issue #1 passing object to function 
  
  public function brewCreate($in_name, $in_userid, $in_brygget, $in_stilart, $in_beskrivelse, $in_og, $in_fg, $in_alk, $in_ibu, $in_ebc)
  {

    if ($in_userid == '')
    {
  throw new InvalidLoginException(); 
    }

    $conn = DBH::opretForbindelse();

    try
    {

$query = <<<SQLTEKST
        INSERT INTO beer (beername, userid, brygget, stilart, beskrivelse, og, fg, alk, ibu, ebc)
        VALUES ('$name', '$userid', '$brygget', '$stilart."', '$beskrivelse','$og', '$fg', '$alk', '$ibu', '$ebc')
SQLTEKST;

      $conn->autocommit(FALSE);
      $results = @$conn->query($qstr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);
      $brew_id = $conn->insert_id;
      $conn->commit();
    }
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }

    $conn->close();
    return $brew_id;
  }

  public function brewChange($in_name, $in_userid, $in_brygget, $in_stilart, $in_beskrivelse, $in_og, $in_fg, $in_alk, $in_ibu, $in_ebc)
  {

    if ($in_userid == '')
    {
  throw new InvalidLoginException(); 
    }

    $conn = DBH::opretForbindelse();

    try
    {

$query = <<<SQLTEKST
        Update beer (beername, userid, brygget, stilart, beskrivelse, og, fg, alk, ibu, ebc)
        VALUES ('$name', '$userid', '$brygget', '$stilart."', '$beskrivelse','$og', '$fg', '$alk', '$ibu', '$ebc')
SQLTEKST;

      $conn->autocommit(FALSE);
      $results = @$conn->query($qstr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);

      $brew_id = $conn->insert_id;
      $conn->commit();
    }
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }

    $conn->close();
    return $brew_id;
  }
  
  public function brewInfo($in_brewid)    
  {

    $conn = DBH::opretForbindelse();

    try
    {

      $qstr = <<<EOQUERY
SELECT * FROM beer WHERE userid = '$in_userid' AND beerid = '$in_brewid'
EOQUERY;
     
      $result = @$conn->query($qstr);
      if ($result === FALSE)
      {
        throw new DatabaseErrorException($conn->error);
      }
      else
      {
      while (($row = @$result->fetch_assoc()) !== NULL)
        {
            $user_id['brugernavn'] = $row['brugernavn'];
            $user_id['navn'] = $row['navn'];
            $user_id['email'] = $row['email'];
            $user_id['postnummer'] = $row['postnummer'];
            $user_id['om'] = $row['om'];      
      }      
        
    }
    }  
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }      

    return $user_id;      
  }
  
  public function brewList($in_userid)  
  {
    $conn = DBH::opretForbindelse();

    try
    {

      $qstr = <<<EOQUERY
SELECT * FROM user WHERE userid = '$in_userid'
EOQUERY;
     
      $result = @$conn->query($qstr);
      if ($result === FALSE)
      {
        throw new DatabaseErrorException($conn->error);
      }
      else
      {
      while (($row = @$result->fetch_assoc()) !== NULL)
        {
            $user_id['brugernavn'] = $row['brugernavn'];
            $user_id['navn'] = $row['navn'];
            $user_id['email'] = $row['email'];
            $user_id['postnummer'] = $row['postnummer'];
            $user_id['om'] = $row['om'];      
      }      
        
    }
    }  
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }      

    return $user_id;      
  }
  
  public function brewDelete($in_brewid)
  {

    $conn = DBH::opretForbindelse();

    try
    {

      $qstr = "DELETE FROM brew WHERE brew_id = $in_brewid";
      $result = @$conn->query($qstr);
      if ($result === FALSE)
        throw new DatabaseErrorException($conn->error);
    }
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }

    //
    // clean up and go home!
    //
    $conn->close();
  }

  //
  //=----------------------=
  // private functions
  //=----------------------=
  //
  
  private function escape_string($in_string)
  {
    // $str = $in_string;
    return preg_replace('([%;])', '\\\1', $in_string);
    //return $in_string;
  }

  
}

?>