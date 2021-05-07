<?php
require_once 'config.php';

function logLastDownload($url)
{
  $logFile = getConfig('logfile');
  if (is_file($logFile)) {
    writeLog($url, $logFile);
  } else {
    fopen($logFile, "w") or die("\n[+] Unable to open file!\n");
    fclose($logFile);
    writeLog($url, $logFile);
  }
}

function writeLog($url, $file)
{
  $currentDateTime = getdate(date("U"));
  foreach ($currentDateTime as $key => $val) {
    if ($val < 10) {
      $currentDateTime[$key] = "0$val";
    }
  }
  $commandWithDateTime = "[$currentDateTime[year]-$currentDateTime[mon]-$currentDateTime[mday] $currentDateTime[hours]:$currentDateTime[minutes]:$currentDateTime[seconds]] $url\n";

  $handle = file($file);
  array_unshift($handle, $commandWithDateTime);

  $fp = fopen($file, "w") or die("\n[+] Unable to open file!\n");
  if (count($handle) > getConfig('maxlog')) {
    array_pop($handle);
  }
  fwrite($fp, implode('', $handle));
  fclose($fp);
}
