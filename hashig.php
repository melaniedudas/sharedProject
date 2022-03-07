<html>
<head>
<title>Hashing</title>
</head>
<body>
<?php
$message = 'alphanumerically';
$hash1 = md5($message, true);
$hash2 = sha1($message, true);
$hash3 = hash('sha256', $message, true);
$hash4 = hash('sha384', $message, true);
$hash5 = hash('sha512', $message, true);
$hash6 = hash('sha3-256', $message, true);
$hash7 = hash('sha3-384', $message, true);
$hash8 = hash('sha3-512', $message, true);
echo '<p><b>Message:</b> ' . $message . '</p>';
echo '<p><b>MD5:</b> ' . bin2hex($hash1) . '</p>';
echo '<p><b>SHA1:</b> ' . bin2hex($hash2) . '</p>';
echo '<p><b>SHA256:</b> ' . bin2hex($hash3) . '</p>';
echo '<p><b>SHA384:</b> ' . bin2hex($hash4) . '</p>';
echo '<p><b>SHA512:</b> ' . bin2hex($hash5) . '</p>';
echo '<p><b>SHA3-256:</b> ' . bin2hex($hash6) . '</p>';
echo '<p><b>SHA3-384:</b> ' . bin2hex($hash7) . '</p>';
echo '<p><b>SHA3-512:</b> ' . bin2hex($hash8) . '</p>';
?>
</body>
</html>