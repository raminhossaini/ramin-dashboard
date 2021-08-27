<?php 

function showSideBar($active = null)
{ 
	echo '<div class="row" style="min-height: 100vh;">';
	echo '<div class="col-auto">';
	echo	 '<div class="p-3 text-white bg-dark" style="width: 280px; height:100%;">';
	echo '<a href="'.base_url().'" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"><span class="fs-4"><i class="bi-arrow-left"></i>Home</span></a>';
	echo '<hr>';
	echo '<ul class="nav nav-pills flex-column mb-auto">';
			echo '<li><a href="'.base_url().'/Settings" class="nav-link text-white '; echo ($active == "settings") ? 'active' : ''; echo '">Settings</a></li>';
			echo '<li><a href="'.base_url().'/Sites" class="nav-link text-white '; echo ($active == "sites") ? 'active' : ''; echo '">Sites</a></li>';
			echo '<li><a href="'.base_url().'/Settings/Themes" class="nav-link text-white '; echo ($active == "themes") ? 'active' : ''; echo '">Themes</a></li>';
			echo '<li><a href="https://www.ramin-hossaini.com/donate" class="nav-link text-white"><i class="bi-heart-fill"></i> Donate</a></li>';
			echo '<li><a href="https://www.ramin-hossaini.com" class="nav-link text-white">By: Ramin Hossaini</a></li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
}


function print_timezones()
{
	$OptionsArray = timezone_identifiers_list();
	$select= '<select class="form-control" id="timezone" name="timezone">';
	
	while (list ($key, $row) = each ($OptionsArray) ) {
		$select .='<option value="'.$row.'"';
		$select .= ($key == $selected ? ' selected' : '');
		$select .= '>'.$row.'</option>';
	}  // endwhile;
	
	$select.='</select>';

	return $select;
}

?>