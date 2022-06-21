<?php	
	
	// Function to convert timezone from Europe/Berlin to UTC
	
	function timeConverter($event_date) {
		$userTimezone = new DateTimeZone('Europe/Berlin');
 	    $utcTimezone  = new DateTimeZone('UTC');
		$date = new DateTime($event_date, $userTimezone);
		$date->setTimezone($utcTimezone);
		$output = $date->format('Y-m-d H:i:s');
		return $output;
    }

    // Function to compare version and to calculate event date according to timezone. We presume standard timezone is UTC.
    
    function versionCompare($version, $event_date)  {
        if (version_compare($version, '1.0.17+60', '<')) {
			return timeConverter($event_date);
		}else{
			return $event_date;
		}
    }
?>