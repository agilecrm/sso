// Using JWT from PHP requires you to first either install the JWT PEAR package from
// http://pear.php.net/pepr/pepr-proposal-show.php?id=688 or get the JWT project
// from https://github.com/firebase/php-jwt on GitHub.

<?php
include_once "Authentication/JWT.php";

// Log your user in.

$key       = "{my agile crm shared secret key}";
$domain = "{my agile crm domain}";
$now       = time();

$token = array(
  "name"  => $user->name,
  "email" => $user->email
);

$jwt = JWT::encode($token, $key);
$location = "https://" . $domain . ".agilecrm.com/access/sso?jwt=" . $jwt;


// Redirect
header("Location: " . $location);
?>