<?php
// Initialize the session.
session_start();
// Unset all of the session variables.
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", true);
header("Pragma: no-cache");
unset($_SESSION);
// Finally, destroy the session.    
session_destroy();
ob_end_clean();

// Include URL for Login page to login again.
header("Location: index.php");

exit;
