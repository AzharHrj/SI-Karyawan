<?php
if (isset($_POST['keluar'])) {
  session_start();
  session_unset();
  session_destroy();
  header("location: masuk.php");
}
 ?>
