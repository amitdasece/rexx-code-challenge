<?php

    // Database Connection File //

include "connection.php";

   // TimeZone Converter & Version Comparison containing functions file //

include "functions.php";

   // Path of the JSON File //

$jsonFile="json/Code_Challenge.json";
$jsondata = file_get_contents($jsonFile);
$data = json_decode($jsondata, true);
foreach ($data as $row) {
	
	     // Checking in the Events Master By Unique Event ID and Event Name whether present or not //
	
	$myevents = "SELECT * FROM events WHERE event_id=".$row['event_id']." AND event_name='".$row['event_name']."'";
	$result_myevents = mysqli_query($conn, $myevents);
	if(mysqli_num_rows($result_myevents) > 0) {
		$row_myevents = mysqli_fetch_assoc($result_myevents);
		
		    // If YES //
		
		$event_id = $row_myevents['event_id'];
	}
	else{
	
	         // If NO //
	
	   // Insert into the Events Master for Unique Event ID and Event Name //
	
		$insert_myevents = mysqli_query($conn,"insert into events set event_id='".mysqli_real_escape_string($conn, $row['event_id'])."',event_name='".mysqli_real_escape_string($conn, $row['event_name'])."'");
		$event_id = mysqli_insert_id($conn);
	}
	
	   // Insert into the main DEV Events table //
	
	$query = mysqli_query($conn,"insert into dev_events set participation_id='".mysqli_real_escape_string($conn, $row['participation_id'])."',	
		employee_name='".mysqli_real_escape_string($conn, $row['employee_name'])."',
		employee_mail='".mysqli_real_escape_string($conn, $row['employee_mail'])."',
		event_id='".$event_id."',
		participation_fee='".mysqli_real_escape_string($conn, $row['participation_fee'])."',
		event_date='".mysqli_real_escape_string($conn, $row['event_date'])."',
		version='".mysqli_real_escape_string($conn, $row['version'])."'");echo "<br>";
		
}
		
?>