<?php

 require_once('dbconn.php');

  $itemid  = intval($_POST['itemid']);
  
 
 //SQL query to get results from database
 
  $sql = "update listitems set is_completed = 'yes' where id = $itemid";

  $conn->query($sql);
    
  $conn->close();

  //send a JSON encded array to client
   
  echo json_encode(array('success'=>1));