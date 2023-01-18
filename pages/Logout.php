<?php
session_start();
session_unset();
session_destroy();
header("location:account_page.php?msgS=Logged out succesfully")


?>