<?php
showSideBar('settings');
?>


<div class="col">

<div class="container mt-4">

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Settings</li>
	  </ol>
	</nav>
	
	<form class="mb-4" method="post" id="update_feed" name="update_feed" action="<?= site_url("/Settings/update_feed/");?>">
		<div class="form-group">
			<label for="rss">RSS Feed</label>
			<input type="text" class="form-control" id="rss" name="rss_feed" aria-describedby="" value="<?=$feed['value_text']; ?>">
		</div>
		
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
	
	<form class="mb-4" method="post" id="update_weather_api" name="update_weather_api" action="<?= site_url("/Settings/update_weather_api/");?>">
		<div class="form-group">
			<label for="weather_api">OpenWeatherMap API Key</label>
			<input type="text" autocomplete="off" class="form-control" id="weather_api" name="weather_api" aria-describedby="" value="<?=$weather_api['value_text'];?>">
			
			<div id="suggestion-box"></div>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	</form>


	<form class="mb-4" method="post" id="update_weather" name="update_weather" action="<?= site_url("/Settings/update_weather_location/");?>">
		<div class="form-group">
			<label for="weather_city">Weather Location</label>
			<input type="text" autocomplete="off" class="form-control" id="weather_city" name="weather_city" aria-describedby="" value="<?=$weather_location['value_text'];?>">
			
			<div id="suggestion-box"></div>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
		
		
	<form class="mb-4" method="post" id="update_weather" name="update_weather" action="<?= site_url("/Settings/update_system/");?>">
		<div class="form-group">
			<label for="weather_system">System</label>
			<select class="form-control" id="weather_system" name="weather_system">
				<option value="Metric">Metric</option>
				<option value="Imperial">Imperial</option>
			</select>
		</div>		
		<button type="submit" class="btn btn-primary">Save</button>
	</form>


	<form class="mb-4" method="post" id="update_timezone" name="update_timezone" action="<?= site_url("/Settings/update_timezone/");?>">
		<div class="form-group">
			<label for="timezone">Timezone</label>
			
			<?php
			echo print_timezones();
			?>
			
		</div>		
		<button type="submit" class="btn btn-primary">Save</button>
	</form>

	</div>
  </div>
</div>

<!-- only need jquery ui for this page -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

$(document).ready(function(){
     // Initialize
     
     $( "#weather_city" ).autocomplete({

        source: function( request, response ) {

           // Fetch data
           $.ajax({
              url: "<?=base_url();?>/city/",
              type: 'post',
              dataType: "json",
              data: {
                 weather_city: request.term,
              },
              success: function( data ) {
				var resp = $.map(data.data,function(obj){
                    return obj.city;
               }); 
 
               response(resp);                 
              }
           });
        },
        select: function (event, ui) {
           // Set selection
           $('#suggestion-box').val(ui.item.label); // display the selected text
           $('#weather_city').val(ui.item.value); // save selected id to input
           return false;
        },
        focus: function(event, ui){
          $( "#suggestion-box" ).val( ui.item.label );
          $( "#weather_city" ).val( ui.item.value );
          return false;
        },
      }); 
   }); 

$("#weather_system").val("<?=$system['value_text'];?>"); //set selected value in weather system dropdown
$("#timezone").val("<?=$timezone['value_text']?>"); //set selected value in timezone dropdown



</script>


