<?php

/**
 *
 * BrewFeed
 * 
 * filename: user_manager.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/


 
class UserManager
{
  public $userid;
  public $username;
  public $name;
  public $areacode;
  public $email;
  public $gravatar;
  public $logincode;
  public $joined;
  
  public function isValidUserName($in_user_name)
  {
    if ($in_user_name == '' or ctype_alnum($in_user_name) === FALSE)
      return FALSE;
    else
      return TRUE;
  }                  

  public function userEmailExists($in_email)
  {

    if ($in_email == '')
      throw new InvalidInputException();

    $conn = DBH::opretForbindelse();

    try
    {

      $email = $this->escape_string($in_email);
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
  
  public function userNameExists($in_uname)
  {

    if ($in_uname == '')
      throw new InvalidInputException();

    $conn = DBH::opretForbindelse();

    try
    {

      $name = $this->escape_string($in_uname);
      $qstr = <<<EOQUERY
SELECT brugernavn FROM user WHERE brugernavn = '$name'
EOQUERY;

      $results = @$conn->query($qstr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);

      $user_exists = FALSE;
      while (($row = @$results->fetch_assoc()) !== NULL)
      {
        if ($row['brugernavn'] == $in_uname)
        {
          $user_exists = TRUE;
          break;
        }
      }

    }
    catch (Exception $e)
    {

      throw $e;
    }

    $results->close();
 
    return $user_exists;
  }  

  public function createAccount($brugernavn, $navn, $email, $kodeord)
  {
  $brugernavn = $this->escape_string($brugernavn);
  $navn = $this->escape_string($navn);
  $email = $this->escape_string($email);
  $kodeord = $this->escape_string($kodeord);  
      
    if ($brugernavn == '' or $kodeord == '' or $email == '' or !$this->isValidUserName($brugernavn))
    {
  throw new InvalidLoginException(); 
    }

    $conn = DBH::opretForbindelse();

    try
    {
      $exists = FALSE;
      $exists = $this->userNameExists($brugernavn, $conn);
      if ($exists === TRUE)           
    throw new UserAlreadyExistsException(); 
      $exists = $this->userEmailExists($email, $conn);
      if ($exists === TRUE)
    throw new UserEmailAlreadyExistsException();
      $pwkodeord = md5($kodeord);

      $qstr = <<<EOQUERY
INSERT INTO user
            (brugernavn, navn, email, kodeord)
     VALUES 
            ('$brugernavn', '$navn', '$email', '$pwkodeord')
EOQUERY;

      $results = @$conn->query($qstr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);

      $user_id = $conn->insert_id;
    }
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }

    $conn->close();
    return $user_id;
  }

  public function processLogin($in_user_name, $in_user_passwd)
  {
   $uname = $this->escape_string($in_user_name);
   $upasswd = $this->escape_string($in_user_passwd);
        
  if ($uname == '' || $upasswd == '')
   // Hvis input er tomt er der snyd! java checker om der er tastet i felterne.
  throw new InvalidLoginException(); 

    $sessionid = session_id();
    $conn = DBH::opretForbindelse();
    
    
    try
    {
      $userid = $this->confirmUserNamePasswd($uname, $upasswd);
      $this->clearLoginEntriesForUser($userid);
 
      $query = <<<EOQUERY
INSERT INTO loggedinusers(user_id, sessionid, lastupdate)
     VALUES('$userid', '$sessionid', NOW())
EOQUERY;
     
      $result = @$conn->query($query);
      if ($result === FALSE)
        throw new DatabaseErrorException($conn->error);
    }
    catch (Exception $e)
    {
      if (isset($conn))
        $conn->close();
      throw $e;
    }
    $conn->close();
    return $userid;
  }

  public function processLogout()
  {
 
    $this->clearLoginEntriesForSessionID(session_id());
  }

  public function sessionLoggedIn($in_sid)
  {

    if ($in_sid == '')
      throw new MyInvalidArgumentException();

    $conn = DBH::opretForbindelse();

    try
    {

      $sess_id = $this->escape_string($in_sid);
      $query = <<<EOQUERY
SELECT * FROM loggedinusers WHERE sessionid = '$sess_id'
EOQUERY;

      $result = @$conn->query($query);
      if ($result === FALSE)
      {
        throw new DatabaseErrorException($conn->error);
      }
      else
      {

        $user_id = -1;
        while (($row = @$result->fetch_assoc()) !== NULL)
        {
          if ($row['sessionid'] == $sess_id)
          {
            $this->updateSessionActivity($in_sid);
            $user_id = $row['user_id'];
            break;
          }
        }
      }
    }
    catch (Exception $e)
    {
      throw $e;
    }

    //
    // our work here is done.  clean up and exit.
    //
    $result->close();
    return $user_id;
  }

  public function getAccountInfo($in_userid)  
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

  public function deleteAccount($in_userid)
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
  
  private function escape_string($in_string)
  {
    // $str = $in_string;
    return preg_replace('([%;])', '\\\1', $in_string);
    //return $in_string;
  }

  private function confirmUserNamePasswd($in_user_name, $in_user_passwd)
  {
    $in_user_name = strtolower($in_user_name);
    $conn = DBH::opretForbindelse();

    try
    {

      $querystr = <<<EOQUERY
SELECT * FROM user
 WHERE brugernavn = '$in_user_name'
EOQUERY;

      $results = @$conn->query($querystr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);

      $login_ok = FALSE;
      while (($row = @$results->fetch_assoc()) !== NULL)
      {
        $db_name = strtolower($row['brugernavn']);
        if (strcmp($db_name, $in_user_name) == 0)
        {
          if (md5($in_user_passwd) == $row['kodeord'])
          {
            $login_ok = TRUE;
            $userid = $row['userid'];
          }
          else
            $login_ok = FALSE;
          break;
        }
      }
    }
    catch (Exception $e)
    {
      throw $e;
    }

    if ($login_ok === FALSE)
    
    throw new NoSuchUserException(); 
    
    $results->close();
    return $userid;
  }

  private function clearLoginEntriesForUser($in_userid)
  {

      $conn = DBH::opretForbindelse();

    try
    {
      $querystr = <<<EOQUERY
DELETE FROM loggedinusers WHERE user_id = $in_userid
EOQUERY;

      $results = @$conn->query($querystr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);
    }
    catch (Exception $e)
    {

      throw $e;
    }
   
  }

  private function clearLoginEntriesForSessionId($in_sid)
  {
    $conn = DBH::opretForbindelse();

    try
    {
      $sessid = $this->escape_string($in_sid);
      $query = <<<EOQ
DELETE FROM loggedinusers WHERE sessionid ='$sessid'
EOQ;
      $results = @$conn->query($query);
      if ($results === FALSE or $results === NULL)
        throw new DatabaseErrorException($conn->error);
    }
    catch (Exception $e)
    {
      throw $e;
    }
  }

  private function updateSessionActivity($in_sessid)
  {
    //
    // make sure we have a database connection.
    //
     $conn = DBH::opretForbindelse();

    try
    {

      $sessid = $this->escape_string($in_sessid);
      $querystr = <<<EOQUERY
UPDATE loggedinusers SET lastupdate = NOW()
  WHERE sessionid = '$in_sessid'
EOQUERY;

      $results = @$conn->query($querystr);
      if ($results === FALSE)
        throw new DatabaseErrorException($conn->error);
    }
    catch (Exception $e)
    {
      throw $e;
    }
  }
}

?>