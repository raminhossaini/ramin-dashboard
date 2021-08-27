<?php
showSideBar('sites');
?>

	<div class="col">
<div class="container mt-4">

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?=base_url();?>/Sites">Sites</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Links Edit</li>
	  </ol>
	</nav>

  <div class="row">
    <div class="col">

  <div class="container mt-5">
    <form method="post" id="update" name="update" action="<?php echo site_url("/links/update/").$links_obj['link_id']; ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="link_description" class="form-control" value="<?php echo $links_obj['link_description']; ?>">
      </div>

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="link_url" class="form-control" value="<?php echo $links_obj['link_url']; ?>">
      </div>

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="link_icon" class="form-control" value="<?php echo $links_obj['link_icon']; ?>">
      </div>

      <div class="form-group">
        <label>Site ID</label>
        <input type="text" name="site_id" class="form-control" value="<?php echo $links_obj['sites_id']; ?>">
      </div>

      <div class="form-group">
        <label>Sort Order</label>
        <input type="text" name="sort_order" class="form-control" value="<?php echo $links_obj['sort_order']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Update Data</button>
      </div>
    </form>
  </div>
    	
    	
    </div>
    <div class="col">
    </div>
    <div class="col">
    </div>
  </div>
</div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
