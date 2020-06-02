<?php  if (count($errors) > 0) : ?>
    <div class="error">
  	    <?php foreach ($errors as $error) : ?>
  	        <p><?php echo $error ?></p>
  	    <?php endforeach ?>
    </div>
<?php  endif ?>


<style>
	/* .error {
		margin: 0px auto; 
		padding: 5px; 
		border: 1px solid #a94442; 
		color: #a94442; 
		background: #f2dede; 
		border-radius: 5px; 
		text-align: left;

		width: 80%;
		margin-left: 10%;
    	margin-right: 10%;
	} */
	/* .success {
		color: #3c763d; 
		background: #dff0d8; 
		border: 1px solid #3c763d;
		margin-bottom: 20px;
	} */
</style>