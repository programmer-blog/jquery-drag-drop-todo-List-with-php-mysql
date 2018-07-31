<?php

require_once('dbconn.php');

$sqlIncomplete    = "SELECT id, name, detail, is_completed FROM listitems where is_completed = 'no' ORDER 
                     BY id desc";

$result           = mysqli_query($conn, $sqlIncomplete);

//Fetch all imcomplete list items
$incomleteItems   = mysqli_fetch_all($result,MYSQLI_ASSOC);

//Get incomplete items
$sqlCompleted     = "SELECT id, name, detail, is_completed FROM listitems where is_completed = 'yes' ORDER 
                     BY id desc";
  
$completeResult    = mysqli_query($conn, $sqlCompleted);

//Fetch all complted items
$completeItems     = mysqli_fetch_all($completeResult, MYSQLI_ASSOC);
 
//Free result set
mysqli_free_result($completeResult);
mysqli_free_result($result);
  
mysqli_close($conn);


?>
<!doctype html>
<html lang="en">

<head>
 
 <meta charset="utf-8">

 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <title>jQuery Drag and Drop TODO List with PHP MySQL</title>
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
<style>
  .li_containers{
  	width: 52%;
  	float: left;
  }
  .listitems { 
      width: 150px; 
      height: 150px; 
      padding: 0.5em; 
      float: left; 
      margin: 10px 10px 10px 0;
      border: 1px solid black;
      font-weight: normal;
   }

  #droppable { 
    width:   550px; 
    height:  550px; 
    padding: 0.5em; 
    float:   right; 
    margin:  10px;
    cursor:  pointer;
   }
  </style>
</head>

<body>
 
 <p><h2 align="center">jQuery Drag and Drop TODO List with PHP MySQL</h2></p>
 <div class="li_containers">
 
 <?php foreach ($incomleteItems as $key => $item) { ?>
 
   <div class="ui-widget-content listitems" data-itemid=<?php echo $item['id'] ?> >
 
     <p><strong><?php echo $item['name'] ?></strong></p>
 
     <hr />
 
     <p><?php echo $item['detail'] ?></p>
 
   </div>
 
 <?php } ?> 
  
</div>

<div id="droppable" class="ui-widget-header">

  <?php foreach ($completeItems as $key => $citem) { ?>

    <div class="listitems" >

      <p><strong><?php echo $citem['name'] ?></strong></p>

      <hr />

      <p><?php echo $citem['detail'] ?></p>

    </div>

  <?php } ?>

</div>

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
 <script>

  $( function() {

    $( ".listitems" ).draggable();

    $( "#droppable" ).droppable({
 
      drop: function( event, ui ) {
         
          $(this).addClass( "ui-state-highlight" );
 
          var itemid = ui.draggable.attr('data-itemid')
          
          $.ajax({
             method: "POST",
           
             url: "update_item_status.php",
             data:{'itemid': itemid}, 
          }).done(function( data ) {
             var result = $.parseJSON(data);
           
           });
         }
      });
  });
</script>
</body>

</html>