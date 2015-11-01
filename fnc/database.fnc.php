<?php

/**
 *
 * WWW.PIGIT.DK
 * 
 * database.fnc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2005
 *
 **/

$selfparts = split('/', $_SERVER['PHP_SELF']);
$file = ereg_replace('\\\\', '/', __FILE__);
$fileparts = split('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
    {
    header('location:/');
    exit;
    }
 
function escape_string
  (
    $in_string,
    $in_markup = FALSE
  )
  {
    if ($in_string === NULL)
      return '';

    $str = ereg_replace('([\'%;])', '\\\1', $in_string);
    if ($in_markup == TRUE)
    {
      $str = htmlspecialchars($str, ENT_NOQUOTES,
          "UTF-8");
    }

    return $str;
  }

function solo_db_connect($server= DB_SERVER, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD, $database = DB_DATABASE, $link = 'db_link')
  {
    global $$link;
	
    $$link = mysql_connect($server, $username, $password);
	
	if ($$link) mysql_select_db($database);
	
	return $$link;
  }
	
function solo_db_close($link = 'db_link') {
	global $$link;
	
	return mysql_close($$link);
	}	
	
function solo_db_error($query, $errno, $error)
    {
	die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[SOLO STOP]
	</FONT></SMALL><BR><BR></B></FONT>');
    }
	
function solo_db_query($query, $link = 'db_link') {
	global $$link;
	
	$result = mysql_query($query, $$link) or solo_db_error($query, mysql_errno(), mysql_error());
	$result_error = mysql_error();
  
	return $result;
	}

function solo_db_fetch_array($db_query) {
	return mysql_fetch_array($db_query, MYSQL_ASSOC);
	}

function solo_db_num_rows($db_query) {
	return mysql_num_rows($db_query);
	}

function solo_db_begin() {
	mysql_query('BEGIN') or solo_db_error('BEGIN_ERR', mysql_errno(), mysql_error());
	$result_error = mysql_error();
	}

function solo_db_commit() {
	mysql_query('COMMIT') or solo_db_error('COMMIT_ERR', mysql_errno(), mysql_error());
	$result_error = mysql_error();
	}

function solo_db_rollback() {
	mysql_query('ROLLBACK') or solo_db_error('ROLLBACK_ERR', mysql_errno(), mysql_error());
	$result_error = mysql_error();
	}

?>