<?php
	require_once 'header.php';
?>
<div>
	<div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Genre</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Remove</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>		    	
		    	<?php
		    	$i = 1;
		    		foreach($genre as $row)
		    		{
		    	?>		
		      <th scope="row"><?php echo $i; ?></th>
		     <!--  <td class="w-25">
			      <img src="<?php echo base_url().$row->image; ?>" class="img-fluid img-thumbnail" alt="" style="width: 100px; height: 100px;">
		      </td> -->
		      <td><?php  echo $row->strGenre; ?></td>
		      <td><?php echo anchor("Create/edit_genre/$row->lngGenreID" , '<i class="fa fa-edit"></i>', 'name="genre_id"');?></td>
		      <td><?php echo anchor("Create/del_genre/$row->lngGenreID" , '<i class="fa fa-trash"></i>', 'name="genre_id"');?></td>
		    </tr>
		    <?php	
		    	$i++;	
		    		}
		    	  ?>
		    </tr>
		  </tbody>
		</table>   
    </div>
  </div>
</div>
</div>