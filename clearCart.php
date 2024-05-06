<?php
// Start the session
session_start();

// Destroy the session data
session_destroy();

// Redirect to the same page or wherever you want
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
?>
