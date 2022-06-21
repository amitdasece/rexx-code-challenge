<?php 
include "connection.php";
include "functions.php";
	$data = array();
	
	// Main Query for the Desired Output //
	
    $myevents = "SELECT dev_events.*,event_name FROM dev_events,events WHERE dev_events.event_id=events.event_id ";
	
	// Filter Search for the Main Output in Datatable //
	
	if(@$_REQUEST['employee_name'] != ''){
		$myevents.= " AND employee_name LIKE '%".@$_REQUEST['employee_name']."%'";
	}
	if(@$_REQUEST['event_id'] > 0){
		$myevents.= " AND dev_events.event_id = '".@$_REQUEST['event_id']."'";
	}
	if(@$_REQUEST['from_date_event'] != '' && @$_REQUEST['to_date_event'] != ''){
		$myevents.= " AND DATE_FORMAT(event_date,'%Y-%m-%d') >= '".date("Y-m-d", strtotime(@$_REQUEST['from_date_event']))."' AND DATE_FORMAT(event_date,'%Y-%m-%d') <= '".date("Y-m-d", strtotime(@$_REQUEST['to_date_event']))."'";
	}
	
	
	$myevents.= " ORDER BY dev_events.event_date DESC";
    $result_myevents = mysqli_query($conn, $myevents);
    if(mysqli_num_rows($result_myevents) > 0) {
        while($row1 = mysqli_fetch_assoc($result_myevents)) {
		   $row1['participation_id'] = $row1['participation_id'];
		   $row1['employee_name'] = $row1['employee_name']; 
		   $row1['employee_mail'] = $row1['employee_mail'];
		   $row1['event_name'] = $row1['event_name']; 
		   $row1['event_date'] = versionCompare($row1['version'],$row1['event_date']);
		   $row1['version'] = $row1['version']; 
		   $row1['participation_fee'] = $row1['participation_fee'];
		   $data[] = $row1;
        }
    }
    echo json_encode( array('data' => $data) );

?>