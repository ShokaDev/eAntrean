<?php
// logout.php

session_start();
session_destroy();
header('Location: ../login.php'); // Assume login page exists
exit;
?>