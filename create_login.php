<!DOCTYPE html>


<?php

function create_login()
{
	if ( ! array_key_exists("username", $_POST) )
    	{
  	?>
        <form method="post"action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        	<div class="login"
            	    <p> Please enter Oracle username/password: </p>
		    <p>
           		<label for="username"> Username: </label>
            		<input type="text" name="username" id="username" /> 
		    </p>
		    <p>
            		<label for="password"> Password: </label>
            		<input type="password" name="password" 
                  	 id="password" />
		    </p>

            		
                <input type="submit" value="Log in" />
            	</div>	
        			
        </form>
    	<?php
	}  
}
 ?>
</body>
</html>