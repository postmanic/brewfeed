<?php

/**
 *
 * BrewFeed
 * 
 * filename: error_handler.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/


$msg="";    
    
function app_error_handler
(
  $in_errno,
  $in_errstr,
  $in_errfile,
  $in_errline,
  $in_errcontext
)
{
  /**
   * If we already have an error, then do no more.
   */
  if (isset($_SESSION) 
      and (isset($_SESSION['errstr'])
           or isset($_session['exception'])))
  {
    return;
  }

  /**
   * first, we will log the error so we know about it.
   */

error_log(date('c') . " Unhandled Error ($in_errfile, $in_errline): " . "$in_errno, '$in_errstr'\r\n", 3, 'beerfeed.log');

  /**
   * if we have session information, send the user to more
   * helpful pastures.
   */
  if (isset($_SESSION))
  {
    $_SESSION['errstr'] = "$in_errstr ($in_errfile, line $in_errline)";
  }
  
  header('Location: error.php ');
        
}

/**
 *=-----------------------------------------------------------=
 * app_exception_handler
 *=-----------------------------------------------------------=
 * This is our default exception handler, which we will use to
 * report the contents of uncaught exceptions.  our web
 * application will throw exceptions when it encounters fatal
 * errors from which it cannot recover.  we will write log
 * information about the error and attempt to send the user to
 * a more helpful page where we can give them less scary
 * messages ...
 *
 * Parameters:
 *    $in_exception         - the exception that was thrown.
 */
function app_exception_handler($in_exception)
{
  /**
   * If we already have an error, then do no more.
   */
   

  if (isset($_SESSION)
      and (isset($_SESSION['errstr'])
           or isset($_session['exception'])))
  { 
    return;
  }

  /**
   * first, log the exception
   */
  $class = get_class($in_exception);
  $file = $in_exception->getFile();
  $line = $in_exception->getLine();
  $msg = $in_exception->getMessage();
  error_log(date('c') . " Unhandled Exception: $class ($file, $line): " . "$msg\r\n", 3, 'beerfeed.log');
  
  if (isset($_SESSION))
  {
    $_SESSION['exception'] = $in_exception;
  }

  header('Location: error.php ');
}

/**
 * Install these two new functions that we have written.
 */
set_error_handler('app_error_handler');
set_exception_handler('app_exception_handler');

 /**
 *=-----------------------------------------------------------=
 *=-----------------------------------------------------------=
 *=-----------------------------------------------------------=
 * Okay, these are the exceptions that we have defined
 * ourselves for use in this application.
 *=-----------------------------------------------------------=
 *=-----------------------------------------------------------=
 *=-----------------------------------------------------------=
 */

class SessionCompromisedException extends Exception
{
  function __construct()
  {
    parent::__construct('We\'re sorry, but there is a good chance that your connection to this site has been compromised.  Please ensure that you have applied the latest security fixes to your web browser, clear your browser cache entirely, and try again.');
  }
}
 
class DatabaseErrorException extends Exception
{
  function __construct($in_errmsg)
  {
    parent::__construct("We\'re sorry, but an internal database error has occurred. Our system administrators have been notified and we kindly request that you try again in a little while.  Thank you for your patience. ($in_errmsg)");
  }

}

class NoSessionException extends Exception
{
  function __construct()
  {
    parent::__construct('We are sorry, but your browser appears to not have cookies enabled.  This site requires a temporary session cookie to help manage your shopping cart.  Please confirm under Tools/Options that you permit at least session cookies');
  }
}

class InternalErrorException extends Exception
{
  function __construct($in_msg)
  {
    parent::__construct("An Internal error in the web application has occurred.  The site administrators have been notified and we kindly ask you to try back again in a bit.  (Message: '$in_msg')");
  }
}


class UserAlreadyExistsException extends Exception
{
  public function __construct()
  {
    parent::__construct('A user with the given name already exists.');
  }
}

class UserEmailAlreadyExistsException extends Exception
{
  public function __construct()
  {
    parent::__construct('An email with the given name already exists.');
  }
}


class NoSuchUserException extends Exception
{
  public function __construct()
  {
    parent::__construct('Forkert brugernavn eller kodeord');
  }
}

class InvalidLoginException extends Exception
{
  public function __construct()
  {
   parent::__construct('Fejl ved login.');
  }
}

class InvalidInputException extends Exception
{
  public function __construct()
  {
    parent::__construct('The form input was incorrect');
  }
}

class InvalidEmailException extends Exception
{
  public function __construct() 
  {
    parent::__construct('Email supplied appears to be incorrect');
  }
}

class ErrorCreatingUser extends Exception
{
  public function __construct()     
  {

  }
}
?>
