<div class="position-absolute top-0 end-0 mx-2 my-2">
<a class="" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#vitals"><span class="badge rounded-pill bg-light text-dark"><i class="bi-list"></i></span></a>
<a class="" aria-current="page" href="<?=base_url();?>/Settings"><span class="badge rounded-pill bg-light text-dark"><i class="bi-gear"></i></span></a>
</div>

<div class="container">

	<div class="container-fluid py-2">

		<div class="row collapse" id="vitals"> <!-- collapsable section -->
		
		<div class="col-auto" id="weather"> 
			<!-- weather widget -->
			<?php
			echo '<p class="mb-0" id="time"></p>';
			echo '<p class="mb-0"><span id="place">'.$weather->place.'</span></p>';
			echo '<p class="mb-0"><span id="description">'.ucfirst($weather->description).'</span></p>';
			echo '<p class="mb-0">Humidity: <span id="humidity">'.$weather->humidity.'</span>%';
			echo '<h5 class="mb-0"><span id="temp">'.$weather->temp.'</span> <img class="mb-1" id="conditions" src="https://openweathermap.org/img/wn/'.$weather->icon.'" width="28"/></h5>';
			?>
			<hr class="mb-1 mt-1"></hr>
			<!-- server stats -->
			<p id="ram" class="mb-0"></p>
			<p id="cpu" class="mb-0"></p>
			<p id="disk" class="mb-0"></p>
			<p id="address" class="mb-0"></p>
		</div>
		

		<!-- news -->
		<div class="col-auto" id="news_feed">
			<div class="spinner-border" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
		
		<!-- search engines -->
		<div class="col-auto">
			<!--<textarea id="scratchpad" class="md-textarea form-control" rows="9"></textarea>-->
			<form target="_blank" action="https://duckduckgo.com/">
				<div class="search-group mb-3">
				  <input type="text" class="form-control" name="q" placeholder="DuckDuckGo" aria-label="DuckDuckGo">
				</div>
			</form>
			<form target="_blank" action="https://google.com/search">
				<div class="search-group2 mb-3">
				  <input type="text" class="form-control" name="q" placeholder="Google" aria-label="Google">
				</div>
			</form>
		</div>
		
		
		</div>

	</div>

	<?php if($sites): ?>
		<?php foreach($sites as $site): ?>
			<div class="container-fluid py-2" id="icon-grid">
			<h3 class="pb-2 border-bottom" style="text-transform:uppercase;"><?= $site['site_description']; ?></h3>
			
			<?php if($links): ?>
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-3">
			<?php foreach($links as $link): ?>
				<?php
					if ($link['sites_id'] == $site['site_id']) { ?>
					<a href="<?=$link['link_url']; ?>" class="" style="text-decoration: none;">
					<div class="col d-flex align-items-start">
					<i class="bi-<?= $link['link_icon']; ?> flex-shrink-0 me-3" style="font-size: 2rem; color: <?=$theme['icon_color'];?>; "></i>
					<div>
						<h4 class="fw-bold mb-0"><?= $link['link_description']; ?></h4>
						<p class="text-muted mb-0" style=""><?=$link['link_display'];?></p>
					</div>
					</div>
					</a>
				<?php } ?>
			<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			</div> <!-- section -->
		<?php endforeach; ?>
	<?php endif; ?>

</div>

<script>

var weatherUrl = "<?=base_url();?>/weather";
var feedUrl = "<?=base_url();?>/feed";
var statsUrl = "<?=base_url();?>/stats";

var myTime = new Date();
const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday","Thursday","Friday","Saturday"];

function capitalizeFirstLetter(string) 
{
	return string.charAt(0).toUpperCase() + string.slice(1);
}

function update_weather() {
    var output = $.ajax({
	type:"GET",
	url: weatherUrl, 
	success: function(result)
	{
		$("#place").html(result.place);
		$("#temp").html(result.temp);
		$("#description").html(capitalizeFirstLetter(result.description));
		$("#conditions").attr("src","https://openweathermap.org/img/wn/"+result.icon);
		$("#humidity").html(result.humidity);
	},
	dataType: "json"
	});
}

function update_time() {
    myTime = new Date();

    var newText = myTime.getDate() + " " + monthNames[myTime.getMonth()] + ", " + myTime.getFullYear() + " " + dayNames[myTime.getDay()] + " " + (new Date()).toTimeString().substr(0,5);
    $('#time').html(newText);
}

function update_news() {
    var output = $.ajax({
	type:"GET",
	url: feedUrl, 
	success: function(result)
	{
		$("#news_feed").html(result);
	},
	});
}

function update_stats() {
    var output = $.ajax({
	type:"GET",
	url: statsUrl, 
	success: function(result)
	{
		var json = JSON.parse(result);
		
		$("#ram").html("<i class='bi-sd-card'></i> RAM: " + json['ram'] + "%");
		$("#cpu").html("<i class='bi-cpu'></i> CPU: " + json['cpu'] + "%");
		$("#disk").html("<i class='bi-hdd'></i> Disk: " + json['disk'] + "%");
		$("#address").html("<i class='bi-diagram-2'></i> Address: " + json['address']);
	},
	});
}

update_time();
update_news();
update_stats();
update_weather();

setInterval(update_time, 10000);		//Update time every 10 sec
setInterval(update_weather, 300000);	//Update weather every 5 min
setInterval(update_news, 300000);		//Update news every 5 min
setInterval(update_stats, 10000);		//Update news every 10 sec


</script>

