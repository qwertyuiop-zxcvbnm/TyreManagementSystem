<?php
defined('BASEPATH') or exit('No Direct Path Allowed');
echo $head;
echo $left_panel;
echo $right_panel;
?>

<div class="container">
<strong>Events</strong>
<div class="card">
<div class="card-header">
	<strong class="card-title">Event List</strong>
</div>
<div class="card-body">
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#event-modal">Create New Event <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
	<br/>
	<br/>
<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>                                      
                                            <th>Event</th>
                                            <th>Category</th>
																						<th>Venue</th>
                                            <th>StartDate</th>
                                            <th>End Date</th>
																						<th>Status</th>     
																						<th>Action</th>                                
                                    </thead>
                                    <tbody>
															<?php  if ($events==FAlSE)
															    {
																	echo '<td colspan="7" class="text-center">No Events Available</td>';
																	}
																	else
																	{
																		
															 foreach ($events as $event) { ?>
                                       <tr> 
																			 
																			 <td><?php echo $event['EventHeader'] ?></td>
																			 <td><?php echo $event['EventCategoryName'] ?></td>
																			 <td><?php echo $event['EventLocation'] ?></td>
																			 <td><?php echo $event['StartDate'] ?></td>
																			 <td><?php echo $event['EndDate'] ?></td>
																																														
																		 <td>
																			 <label><span class="badge badge-<?php echo  $event['Class'];?>"><?php echo $event['EventStatus'] ?> </span></label>																		 
																			 </td>
																			 <td style="width:170px">
																			 <a type="button" href="<?php echo site_url("Admin/event_details/?eid=").$event['EventInfoId']; ?>" data-toggle="tooltip" 
																			 title="View Details" class="btn btn-primary">
																			 <i class="fa fa-eye" aria-hidden="true"></i>
																			 </a>
																		
																			 <button type="button" data-toggle="tooltip" 
																			 title="Edit" class="btn btn-warning"><i class="fa fa-pencil-square-o"
																			
																			  aria-hidden="true"></i></button>
																			 
																			 <button type="button" data-toggle="tooltip" 
																			 title="Delete" class="btn btn-danger">
																			 <i class="fa fa-window-close-o" aria-hidden="true"></i>
																			 </button>
																			 
																			 </td>
																			 </tr>
																
													     <?php	}	} 	?>	
                                                                     
                                    </tbody>
                                </table>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="event-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="event-modal-label">Create New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form >

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default" style="background-color:#F1B9AE; width:100px;">Event Title</span>
  </div>
  <input type="text" id="et" class="form-control" aria-label="EventTitle" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group  mb-3">
  <div class="input-group-prepend"  >
    <span class="input-group-text" style="background-color:#F1B9AE; width:100px;" id="inputGroup-sizing-lg">Desc</span>
  </div>
  <textarea id="ed" class="form-control" aria-label="Description" aria-describedby="inputGroup-sizing-sm" ></textarea>
</div>


<div class="input-group mb-3">
  <div class="input-group-prepend" >
    <span class="input-group-text" style="background-color:#F1B9AE; width:100px;"  id="inputGroup-sizing-default">Venue</span>
  </div>
  <input type="text" id="ev" class="form-control" aria-label="EventTitle" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</button>
    <div class="dropdown-menu" id="category-item">
	  <a class="dropdown-item" href="#">Entertainment</a>
	  <div role="separator" class="dropdown-divider"></div>
	  <a class="dropdown-item" href="#">Sports</a>
	  <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Educational</a>
      <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Others</a>
    </div>
  </div>
  <input type="text" id="ec" class="form-control" aria-label="Text input with dropdown button">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text " style="background-color:#F1B9AE; width:100px;" id="inputGroup-sizing-default">Start Date</span>
  </div>
  <input type="datetime-local" id="sd" class="form-control" aria-label="EventTitle" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text " style="background-color:#F1B9AE; width:100px;" id="inputGroup-sizing-default">End Date</span>
  </div>
  <input type="datetime-local" id="eed" class="form-control" aria-label="EventTitle" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text " style="background-color:#F1B9AE; width:100px;" id="inputGroup-sizing-default">Event Seats</span>
  </div>
  <input type="number" id="es" class="form-control" aria-label="EventTitle" aria-describedby="inputGroup-sizing-default">
</div>
   </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
	<div>
  <button type="button" id="my" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
</div>
</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends Here -->



</div>
</div>

<?php
echo $foot;
?>
