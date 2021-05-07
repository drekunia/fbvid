<?php
function printAlert($arr)
{
  echo "\n";
  foreach ($arr as $val) {
    echo "[+] $val\n";
  }
}

function downloadSuccess($dir, $file)
{
  $alerts = [
    'status' => 'Download success!',
    'directory' => 'Saved in: ' . $dir,
    'filename' => 'Filename: ' . $file
  ];

  printAlert($alerts);
}

function downloadFailed($param)
{
  $alerts = [
    'status' => 'Download failed.',
    'internet' => 'Please check your internet connection.',
    'link' => "Make sure you've entered the correct link."
  ];

  switch ($param) {
    case 'internet':
      printAlert([$alerts['status'], $alerts['internet']]);
      break;
    case 'link':
      printAlert([$alerts['status'], $alerts['link']]);
      break;
    default:
      printAlert($alerts);
      break;
  }
}

function notFacebook()
{
  $alerts = ["This app can only be used to download video from Facebook."];
  printAlert($alerts);
}
