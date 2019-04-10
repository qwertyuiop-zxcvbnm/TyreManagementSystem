

    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
   
    <script src="<?php echo base_url('assets/vendors/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/main.js') ?>"></script>


    <script src="<?php echo base_url('assets/assets/vendors/chart.js/dist/Chart.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/dashboard.js') ?>"></script>
    <script src="<?php echo base_url('assets/assets/js/widgets.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/jqvmap/dist/jquery.vmap.min.js') ?>"></script>
    <script src="<?php echo base_url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
    <script src="<?php echo base_url('vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	


    <script>
        (function($) {
            "use strict";

    
	//////////////////////////////////////////////////////////////
	///////////////---GLOBAL--////////////////////////////////////

	//1.DATE TIME PICKER

	///2.initiliaze all tooltips
	     $('[data-toggle="tooltip"]').tooltip(); 

			
	////////////////////////////////////////////////////
     ////////////-- Event List--////////////////////////

    //    1. Populate modal category input from dropdown //
  
	  $('#category-item a').on('click',function () { 
	    $("#ec").val($(this).text());
         });


	//     2. Save Event

	


	$('#my').on('click', function() {
     //(i) Front End validation 
		

		  //(ii)Save Data
			var data={};
      data.et=$('#et').val();
			data.ed=$('#ed').val();
			data.ev=$('#ev').val();
			data.ec=$('#ec').val();
			data.sd=$('#sd').val();
			data.eed=$('#eed').val();
			data.es=$('#es').val();
			data.cb='Admin'; //Replace this with your seession admin


			var $this = $(this);
      var loadingText = 'Saving <i class="fa fa-spinner fa-spin"></i>';
			$this.data('original-text', $(this).html());
      $this.html(loadingText);
			$.ajax({
      type:"POST",
			url:'<?php echo site_url("Admin/save_event"); ?>',
      data:data,
			success:function(data){
				
				if (data.status==1)
				{
					swal({
            title:"Save Event",
						text:data.msg,
						icon:"success"

						});
					
				  $this.html($this.data('original-text'));
					var url=$(location).attr('href');
					var tokens=url.split('/');
          var edUrl=tokens.slice(0,tokens.length-1).join('/')+'/event_details/?eid='+data.eid;
				  window.location.href=edUrl;
				}
		

       

				
			}
		
			});

  });



////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
    ////////////-- Event Details--//////////////////
		 
			//  //Validate before adding


			 //------------Submit Ticket type data -----------------------//

			 $('#addTicketType').on('click',function(){
		   
		  
			 var et=$('#title').val();
			 var etDesc=$('#etDesc').val();
			 var ess=$('#salesstart').val();
			 var se=$('#salesend').val();
			 var not=$('#nooftickets').val();
			 var maxt=$('#maxtickets').val();
			 var up=$('#unitPrice').val();
        


			 var data={};
      data.datas=[et,etDesc,ess,se,not,not,maxt,up];
			
			data.eid=$('#lblid').text();
			 //2.Send AJAX Post Request
			var $this = $(this);
      var loadingText = 'Saving <i class="fa fa-spinner fa-spin"></i>';
			$this.data('original-text', $(this).html());
      $this.html(loadingText);
      $.ajax({
      type:"POST",
			url:'<?php echo site_url('Admin/post_ticket_type') ?>',
			data:data,
			success:function(returnedData)
			{
				$this.html($this.data('original-text'));
       alert(returnedData.msg);
			 if (returnedData.status==1)
			 {
          //Append ticket type row from modal
			 $('#ticketTypeTable').find('tbody:last').append(
       '<tr>'+
       '<td>'+et+'</td>'+
       '<td>'+ess+'</td>'+
       '<td>'+se+'</td>'+
       '<td>'+not+'</td>'+
       '<td>'+maxt+'</td>'+
			 '<td>'+up+'</td>'+
       '<td><button type="button" class="btn btn-warning btn-sm"><span class="fa fa-pencil"></span></button>'+
       '<button type="button"  class="btn btn-danger btn-sm m-l-20 delete"><span class="fa fa-trash"></span></button></td>'+
       '</tr>');
			 $this.html($this.data('original-text'));
			 }
			 

			},
			error:function(xhr,ajaxOptions,thrownError){			
				alert(thrownError);
				$this.html($this.data('original-text'));
			}



			});


			 });

////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
	  ////////////////////// Upload Image //////////////////

   //--- -------Image Preview
	 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});



///////////////////////////////////////////////////////////////////
function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp1").change(function(){
    readURL1(this);
});         
	  
///////////////////////////////////////////////////////////////////
function readURL2(input) {
    if (input.fileds && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp2").change(function(){
    readURL2(this);
});   


///////////////////////////////////////////////////////////////////
/////////////////---UPLOAD EVENT IMAGES---////////////////////////

////////////////////////////////////////////////////////////////



$('.file-upload').submit(function(e){
	e.preventDefault();
	var	eid=$('#lblid').text(); //Event id

	
	var loadingText = 'Saving <i class="fa fa-spinner fa-spin"></i>';
  var btns=	$(this).find('button');
	btns.data('original-text', btns.html());
	btns.html(loadingText);

	var formData=new FormData(this);
  var cardTitle=$(this).parent().find('.card-title').text();
  formData.append('card_title',cardTitle);
  formData.append('eid',eid);	    
		         $.ajax({
		             url:'<?php echo site_url("Admin/do_upload"); ?>',
		             type:"post",
		             data:formData, //this is formData
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		              success: function(data){
		                  alert(data.msg);
											
		           },
							 error:function (xhr,ajaxOptions,thrownError) {
								 alert(thrownError);
							 }
							 
		         });
						 btns.html($this.data('original-text'));
		});
   

		

          })(jQuery);

  

	




    </script>

</body>

</html>
