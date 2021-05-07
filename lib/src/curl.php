<?php
function curl($url)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_5; en-US) AppleWebKit/534.13 (KHTML, like Gecko) Chrome/9.0.597.15 Safari/534.13");
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
  $content = curl_exec($curl);
  curl_close($curl);
  return $content;
}
