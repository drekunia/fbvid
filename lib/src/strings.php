<?php
function strLeft($str, $separator)
{
  if (intval($separator)) {
    return substr($str, 0, $separator);
  } elseif ($separator === 0) {
    return $str;
  } else {
    $strpos = strpos($str, $separator);

    if ($strpos === false) {
      return $str;
    } else {
      return substr($str, 0, $strpos);
    }
  }
}

function deleteQuery($url)
{
  return strLeft($url, "?");
}

function filenameOnly($url)
{
  return strrev(strLeft(strrev($url), "/"));
}

function domainOnly($url)
{
  return strLeft(ltrim($url, "https://"), "/");
}
