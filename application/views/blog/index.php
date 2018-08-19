<h2>Blog List</h2>
	<?php 
		if($this->session->flashdata('success_msg'))
		{?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success_msg'); ?>
			</div>
		<?php		
		}
	?>
<a href="<?php echo base_url('blog/add'); ?>" class="btn btn-primary">Add New</a>
<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Discription</td>
			<td>Created At</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
			if(!empty($data))
			{
				$i=1;
				foreach($data as $raw)
				{
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $raw['title']; ?></td>
						<td><?php echo $raw['discription']; ?></td>
						<td><?php echo $raw['created_at']; ?></td>
						<td>
							<a href="<?php echo base_url('blog/edit/'.$raw['id']); ?>" class="btn btn-info">Edit</a>
							<a href="<?php echo base_url('blog/delete/'.$raw['id']); ?>" class="btn btn-danger" onclick="return confirm('do you want to delete this record?')">Delete</a>
						</td>
					</tr>
					<?php
					$i++;
				}

			}
		?>			
	</tbody>
</table>
	