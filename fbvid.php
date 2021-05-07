<?php
require_once 'lib/download.php';
require_once 'lib/validate.php';

echo "[#] Enter Facebook Video URL: ";
$v = trim(fgets(STDIN, 1024));
$url = validate($v);
if ($url) {
    download($url);
}
exit(0);
