<?php
session_start();
unset($_SESSION['usuario']);
session_destroy();
echo'<script>window.location.href = "../index.html"</script>';