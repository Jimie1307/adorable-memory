<?php
   session_start();
   
   //destroy sessions upon logout
   if(session_destroy()) {
      header("Location: index.php");
   }
?>