<form method="get" action="../index.php">
	<div class="blue_element top_menu" style='position: relative;'>
		<div style='margin-left: 50px'>
			<img src="../../img/logo.png" height="100%" alt="logo">
		</div>
		<div style='margin-left: 250px;'>
			<img src="../../img/search.png" height="30px" alt="search"
				 style='margin-top: 10px; float: left; position: absolute;'>
			<input type="text" name="request" size="52"
				   <?if(isset($_GET['request'])) echo 'value = '.$_GET['request']?>
				   style='margin-top: 15px; margin-left: 10px; float: left; position: absolute; border: none;'>
		</div>
		<div style='margin-left: 625px; margin-top: 12px;'>
			<input type="image" src="../../img/loupe.png">
		</div>
	</div>
</form>
