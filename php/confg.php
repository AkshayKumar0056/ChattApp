<?php
  $conn = mysqli_connect("localhost" , "root" ," ", "chat");
  
  if($conn)
  {
    echo "database connected";
  } else{
    echo "Error";
  }

?>