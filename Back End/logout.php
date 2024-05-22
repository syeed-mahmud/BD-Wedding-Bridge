<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('You have been logged out.'); window.location.href = '../Front End/login.html';</script>";
?>
