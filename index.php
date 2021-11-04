<?php
include('templates/header.php');?>
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>Build Domain WHOIS Lookup System using PHP and Ajax</h2>
    </div>
    <form id="lookup-form" class="lookup-form" method="post">
	     <div class="row align-items-center">
          <div class="form-group col-md-9">
            <label for="inputEmail4">Domain/IP Address:</label>
            <input type="text" class="form-control" id="domain" name="domain" placeholder="Domain/IP Address:">
          </div>
          <div class="col">
                <button type="button" class="btn btn-primary mt-3 float-left" id="get-lookup"><i class="fa fa-search"></i> ARA</button>
            </div>
        </div>
    </form>
    <hr>
    <div  style="position: relative;
width: 100%;
height:50%;
padding:0px;
background: red;
border-radius:10px;"class="row align-items-center">
      <div style="color:white"class="form-group col-md-12">
        <span style="font-family:arial;color:white;"id="lookup-dispaly-details"></span>
      </div>
    </div>

</div>
</section>
<?php include('templates/footer.php');?>
<script type="text/javascript">
	jQuery(document).on('click', 'button#get-lookup', function(){
	    jQuery.ajax({
	        type:'POST',
	        url:'lookup.php',
	        data:jQuery("form#lookup-form").serialize(),
	        dataType:'html',
	        beforeSend: function () {
	            jQuery('button#get-lookup').button('loading');
	            jQuery('span#lookup-dispaly-details').html('<i class="fa fa-spinner" style="font-size:30px;"></i>').css('background',' red');
	        },
	        complete: function () {
	            jQuery('button#get-lookup').button('reset');
	        },
	        success: function (data) {
            jQuery('#lookup-dispaly-details').css('color',' yellow');
            	jQuery('#lookup-dispaly-details').html(data).css('color',' red');
            },
	        error: function (xhr, ajaxOptions, thrownError) {
	            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
	    });
	});
</script>
