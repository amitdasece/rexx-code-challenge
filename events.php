<?php 
include "connection.php";
include "functions.php";
?>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rexx Coding Challenge</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Rexx Coding Challenge</h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-3">
					<div class="form-group">
					<label for="exampleFormControlInput1">Employee Name</label>
                    <input type="text" name="employee_name" id="employee_name" class="form-control" placeholder="Employee Name"  />
					</div>
                </div>
                <div class="col-md-3">
					<div class="form-group">
					<label for="exampleFormControlInput1">Event Name</label>
                    <select class="form-control" id="event_id" name="event_id">
                      <option value="0">Select Your Event</option>
                      	  <?php
						  
						  // Events Listing For Dropdown Menu //
						  
						  $myevents = "SELECT * FROM events ORDER BY event_name";
						  $result_myevents = mysqli_query($conn, $myevents);
							if(mysqli_num_rows($result_myevents) > 0) {
							while($row1 = mysqli_fetch_assoc($result_myevents)) {?>
                          		<option value="<?php echo $row1['event_id'];?>"><?php echo $row1['event_name'];?></option>
							<?php }}?>
                    </select>
					</div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
					<label for="exampleFormControlInput1">From Date</label>
					<input type="date" class="form-control" name="from_date_event" id="from_date_event">
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="form-group">
					<label for="exampleFormControlInput1">To Date</label>
					<input type="date" class="form-control" name="to_date_event" id="to_date_event">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
            <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="order_table">
           <thead>
            <tr>
                <th>Participation ID</th>
                <th>Employee Name</th>
				<th>Employee Email</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Version</th>
                <th>Participation Fee</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
                <th colspan="6" style="text-align:right">Total:</th>
                <th></th>
            </tr>
          </tfoot>
       </table>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(employee_name = '', event_id = '',from_date_event = '', to_date_event = ''){
  $('#order_table').DataTable({
     select: true,
	"processing": true,
	"serverside": true,
    ajax: {
		//url:'json/Code_Challenge.json',
		url:'getDataload.php',
		data:{employee_name:employee_name, event_id:event_id, from_date_event:from_date_event, to_date_event:to_date_event},
    },
   columns: [
    { "data": "participation_id" },
    { "data": "employee_name" },
    { "data": "employee_mail" },
    { "data": "event_name" },
    { "data": "event_date" },
    { "data": "version"},
    { "data": "participation_fee" }
   ],
   "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 6 ).footer() ).html(
                Math.round(pageTotal * 100) / 100 // (round at most 2 decimal places, but only if necessary)
            );
        }
  });
 }

 $('#filter').on('click',function(){
  var employee_name = $('#employee_name').val();
  var event_id = $('#event_id').val();
  var from_date_event = $('#from_date_event').val();
  var to_date_event = $('#to_date_event').val();
  if(employee_name != '' || event_id != '' || from_date_event || to_date_event)
  {
   $('#order_table').DataTable().destroy();
   load_data(employee_name,event_id,from_date_event,to_date_event);
  }
 });

 $('#refresh').click(function(){
	  $('#employee_name').val('');
	  $('#event_id').val('');
	  $('#order_table').DataTable().destroy();
	  load_data();
 });

});
</script>
