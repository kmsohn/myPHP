<?php
//controller
//gathers data from database table
//formats data into presentation format on browser
session_start(); 
if ($_SESSION['validUser'] == "yes") {
    include 'connectPDO.php';
//get event ID
if(!isset($event_id)) {
    $event_id = filter_input(INPUT_GET, 'event_id',FILTER_VALIDATE_INT);
    if($event_id == NULL || $event_id ==FALSE) {
        $event_id = 1;
    }
}
//get all events
$queryAllEvents = 'SELECT event_id,stylist_name,additional_services,client_name,appt_date,appt_time,  DATE_FORMAT(appt_date, "%m-%d-%Y") AS formattedDate, TIME_FORMAT(appt_time,"%h:%i %p") AS appt_time FROM appointment ORDER BY event_id';
$stmt2 = $conn->prepare($queryAllEvents);
$stmt2->execute();
$events = $stmt2->fetchAll();
$stmt2->closeCursor();
$message = "<h1>The following has been found: " .$stmt2->RowCount() . " " . "rows</h1>";
  $message .= "<p>Return to <a href='login.php'>Login</a>.</p>";
} //end valid user check
else {
    //redirect invalid user to login page
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Please enter your appointment</title>

    <style>
.container {
text-align: center;
}
    .tableFormat {
        border: 2px solid black;
        margin-right: auto;
        margin-left: auto;
    }
    th {
        background-color: lightblue;
       
    }
    td {
       text-align: center;
       border-bottom: 1px solid black;
       width:150px;
       height: 30px;
       border:1px solid black;
       
    }
    
    </style>
</head>
<body>
<div class='container'>
    <section id='content'>
    <?php echo $message  ?>
    <table class='tableFormat'>
		<th>Event Id</th><th>Stylist Name</th><th>Clients Name</th><th>Services</th><th>Appointment Date</th><th>Time</th><th>Update</th><th>Delete</th>

    <?php foreach ($events as $event) {?>
<tr>

<td><?php echo $event['event_id']; ?></td>
<td><?php echo $event['stylist_name']; ?></td>
<td><?php echo $event['client_name']; ?></td>
<td><?php echo $event['additional_services'];?></td>
<td><?php echo $event['appt_date']; ?></td>
<td><?php echo $event['appt_time'];?></td>

<td><form action="updateAppt.php" method="post">
<input type="hidden" name="event_id" value="<?php echo $event['event_id'];?>">
<input type="submit" value="UPDATE">
</form></td>
<td><form action="deleteAppt.php" method="post">
<input type="hidden" name="event_id" value="<?php echo $event['event_id'];?>">
<input type="submit" value="DELETE">
</form></td>
</tr>


    <?php } ?>
</table>
    </section>
    </div>




    

    
   
   

</body>
</html>