<?php
require_once 'config.php';
require_once 'lib/src/curl.php';
require_once 'lib/src/strings.php';
require_once 'lib/src/status.php';
require_once 'lib/src/log.php';

function download($url)
{
  $s = curl($url);

  if ($s) {
    $vurl = preg_match('/<a href=\"\/video_redirect\/\?src\=(.*?)\"/ims', $s, $matches) ? $matches[1] : null;
    if ($vurl) {
      $vu = urldecode($vurl);
      $filename = filenameOnly(deleteQuery($vu));
      $directory = getConfig('directory');

      echo "\n[+] Downloading...\n\n";

      $d = 'wget -O "' . $directory . '/' . $filename . '" --user-agent="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1092.0 Safari/536.6" "' . $vu . '" -q --show-progress';
      system($d, $retval);
      logLastDownload($vu);
      if ($retval == 0) {
        downloadSuccess($directory, $filename);
      } else {
        downloadFailed("internet");
      }
    } else {
      downloadFailed("link");
    }
  } else {
    downloadFailed(0);
  }
}
