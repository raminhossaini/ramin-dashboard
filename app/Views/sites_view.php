<?php
showSideBar('sites');
?>

	<div class="col">

	<div class="container mt-4">

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Sites</li>
	  </ol>
	</nav>

     <table class="table table-hover" id="sites-list">
       <thead>
          <tr>
             <th>Site Id</th>
             <th>Description</th>
             <th>Sort Order</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($sites): ?>
          <?php foreach($sites as $site): ?>
          <tr>
             <td><?php echo $site['site_id']; ?></td>
             <td><?php echo $site['site_description']; ?></td>
             <td><?php echo $site['sort_order']; ?></td>
             <td>
              <a href="<?php echo base_url('Sites/edit/'.$site['site_id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('Links/index/'.$site['site_id']);?>" class="btn btn-primary btn-sm">Edit Links</a>
              <a href="<?php echo base_url('Sites/delete/'.$site['site_id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
    	</tbody>
    </table>
	</div>


<div class="container">
	<form method="post" id="add_create" name="add_create" action="<?= site_url('/sites/store') ?>">
		<table class="table table-borderless" id="sites-add">
			<thead>
				<tr>
					<th scope="col">Description</th>
					<th scope="col">Sort Order</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td scope="row"><input type="text" name="site_description" class="form-control"></td>
				<td scope="row"><input type="text" name="sort_order" class="form-control"></td>
				<td scope="row"><button type="submit" class="btn btn-primary btn-block">Add Site</button></td>
			</tr>
			</tbody>
		</table>
	</form>
</div> 


			
			
		</div>
	</div>

<script>
$(document).ready(function() {
    $('#sites-list').DataTable();
} );
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


