<?php

  function getCountryFromIP($ip, $type = "code")
  {
    $ip = file_get_contents("http://freegeoip.net/json/{$ip}");
    $ip = json_decode($ip);
    if ($type == 'code') {
      return $ip->country_code;
    } else if ($type == 'name') {
      return $ip->country_name;
    } else {
      return false;
    }
  }

?>