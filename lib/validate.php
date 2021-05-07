<?php
require_once 'lib/src/strings.php';
require_once 'lib/src/status.php';

function validate($string)
{
  if (strpos(domainOnly($string), 'facebook')) {
    return str_replace('www', 'mbasic', $string);
  } else {
    notFacebook();
    return false;
  }
}
