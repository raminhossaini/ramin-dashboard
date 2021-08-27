
	<?php
	/*echo "The theme ID: ".$myTheme['value'];
	echo " The theme name: ".$theme['theme_name'];
	echo " The icon color: ".$theme['icon_color'];
	*/
	?>

<?php
showSideBar('themes');
?>

	<div class="col">

<div class="container mt-4">

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Theme</li>
	  </ol>
	</nav>
	
     <table class="table table-hover" id="themes-list">
       <thead>
          <tr>
             <th>Theme Name</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($allThemes): ?>
          <?php foreach($allThemes as $theme): ?>
          <tr>
             <td>
             	<?php echo $theme['theme_name']; ?>
             	<?php
             		if ($theme['theme_id'] == $myTheme['value']) {
             			echo ('<span class="badge bg-primary">Current</span>');
             		}
             	?>
             </td>
             <td>
             	<?php
             		//only show button if it isn't the current theme
             		if ($myTheme['value'] != $theme['theme_id']) {
             	?>
            	<a href="<?php echo base_url('Settings/update_theme/'.$theme['theme_id']);?>" class="btn btn-primary btn-sm">Activate</a>
            	<?php 
            		}
            	?>
            	
             </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
	</div>
  </div>
</div>


