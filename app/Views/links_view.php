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

     <table class="table table-hover" id="links-list">
       <thead>
          <tr>
             <th>Description</th>
             <th>URL</th>
             <th>Icon</th>
             <th>Sort Order</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($links): ?>
          <?php foreach($links as $link): ?>
          <tr>
             <td><?php echo $link['link_description']; ?></td>
             <td><?php echo $link['link_url']; ?></td>
             <td><?php echo $link['link_icon']; ?></td>
             <td><?php echo $link['sort_order']; ?></td>
             <td>
              <a href="<?php echo base_url('Links/edit/'.$link['link_id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('Links/delete/'.$link['link_id']).'/'.$site_id; ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>

 
<div class="container">
<form method="post" id="add_create" name="add_create" action="<?= site_url('/Links/store/'.$site_id); ?>">
	<input type="hidden" name="site_id" class="form-control" value="">
<table class="table table-borderless" id="sites-add">
<thead>
  <tr>
	<th scope="col">Description</th>
	<th scope="col">Link URL</th>
	<th scope="col">Link Icon</th>
	<th scope="col">Sort Order</th>
	<th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <tr>
	<td scope="row"><input type="text" name="link_description" class="form-control"></td>
	<td scope="row"><input type="text" name="link_url" class="form-control"></td>
	<td scope="row"><input type="text" name="link_icon" class="form-control"></td>
	<td scope="row"><input type="text" name="sort_order" class="form-control"></td>
	<td scope="row"><button type="submit" class="btn btn-primary btn-block">Add Link</button></td>
  </tr>
</tbody>
</table>
</form>
</div>
</div>

<script>
$(document).ready(function() {
    $('#links-list').DataTable();
} );
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>



