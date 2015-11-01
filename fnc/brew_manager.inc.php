<?php

/**
 *
 * STARMOLE
 * 
 * user_manager.inc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2008
 *
 **/

class BrewManager
{
  
  public function userBrewAllowed($in_userid)  
  {

    if ($in_email == '')
      throw new InvalidInputException();

    $conn = DBH::opretForbindelse();

    try
    {

      $email = $this->super_escape_string($in_email);
      $qstr = <<<EOQUERY
SELECT userid, email FROM user WHERE email = '$email'
EOQUERY;

      $results = @$conn->query($qstr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);

      $useremail_exists = FALSE;
      while (($row = @$results->fetch_assoc()) !== NULL)
      {
        if ($row['email'] == $email)
        {
          $useremail_exists = $row['userid'];
          break;
        }
      }

    }
    catch (Exception $e)
    {

      if ($in_db_conn === NULL and isset($conn))
        $conn->close();
      throw $e;
    }

    $results->close();
    return $useremail_exists;
  } 
  
  public function createBrew($in_name, $in_userid, $in_brygget, $in_stilart, $in_beskrivelse, $in_og, $in_fg, $in_alk, $in_ibu, $in_ebc)
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

  public function getBrewInfo($in_userid, $in_brewid)    
  {
    //
    // 1. make sure we have a database connection.
    //
    $conn = DBH::opretForbindelse();

    try
    {
      //
      // 2. prepare and execute query.
      //

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
  
  public function getBrewList($in_userid)  
  {
    //
    // 1. make sure we have a database connection.
    //
    $conn = DBH::opretForbindelse();

    try
    {
      //
      // 2. prepare and execute query.
      //

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
  
  public function deleteBrew($in_userid)
  {
    //
    // 0. verify parameters
    //
    if (!is_int($in_userid))
      throw new InvalidArgumentException();

    //
    // 1. get a database connection with which to work.
    //
    $conn = $this->getConnection();
    try
    {
      //
      // 2. make sure user is logged out.
      //
      $this->clearLoginEntriesForSessionID(session_id());

      //
      // 3. create query to delete given user and execute!
      //
      $qstr = "DELETE FROM Tbruger WHERE user_id = $in_userid";
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
  // private functions next
  //=----------------------=
  //
  
  private function super_escape_string($in_string)
  {
    // $str = $in_string;
    return preg_replace('([%;])', '\\\1', $in_string);
    //return $in_string;
  }

  
}

?>