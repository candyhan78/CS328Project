<?php
function create_options()
{	
	if(! array_key_exists('username', $_SESSION))
	{
		destroy_and_exit("NO USERNAME FOUND");
	}
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$conn = hsu_conn_sess($username, $password);
        ?>
  
        <form class="options" method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
			<fieldset id = "Login">
				<legend> Options </legend>
				<input type="submit" name="custom_dropdown" value="Select Drink" />
				<input type="submit" name="empl_query" value="Employee Info" />
				<input type="submit" name="update" value="Update" /> <br/>
				<p><input type="submit" name="back" value="Logout" /></p>
			</fieldset>
		</form>
<?php
}
?>	