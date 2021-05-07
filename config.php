<?php
function getConfig($param)
{
  $username = posix_getpwuid(posix_geteuid())['name'];

  $config = [
    'username' => $username,
    'directory' => "/home/{$username}/Downloads",
    'maxlog' => 10,
    'logfile' => "downloads.txt"
  ];

  return $config[$param];
}
