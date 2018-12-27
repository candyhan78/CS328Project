<?php
    session_start();


?>
<!--
    using session attributes to control a multi-state
    application

    by: Andy Chan
    last modified: 4/26/2018

    you can run this using the URL:
                    http://nrs-projects.humboldt.edu/~awc27/328hw12/custom-session2.php
-->

<head>
    
    <?php
        require_once("create_login.php");
        require_once("custom_dropdown.php");
        require_once("custom_fetch_price.php");
        require_once("destroy_and_exit.php");
        require_once("hsu_conn.php");
		require_once("options.php");
		require_once("empl_query.php");
		require_once("updateform.php");
		require_once("update_finalize.php");
    ?>

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css"
          type="text/css" rel="stylesheet" />
    <link href="custom.css"
          type="text/css" rel="stylesheet" />

	<script src="confirm.js" type="text/javascript" defer="defer"> </script>
</head>

<body>
    <h1> Andy Chan CS328 </h1>
    <h1> Andy's Tavern </h1>

    <?php

    if (! array_key_exists('next_stage', $_SESSION))
	{
		create_login();
		$_SESSION['next_stage'] = "Login";
	}
	
	elseif($_SESSION['next_stage'] == "Login")
	{
		$username = strip_tags($_POST['username']);  
		$password = strip_tags($_POST['password']);
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$conn = hsu_conn_sess($username, $password);
		
		create_options();
		$_SESSION['next_stage'] = "create_options";
	}

	
	elseif($_SESSION['next_stage'] == "create_options")
	{
		if(isset($_POST["back"]))
		{
			session_destroy();
			session_regenerate_id(TRUE);
			session_start();
			
			create_login();
			$_SESSION['next_stage'] = "Login";
		}
		elseif(isset($_POST["custom_dropdown"]))
		{
			custom_dropdown();
			$_SESSION['next_stage'] = "get_price";
		}
		
	
		elseif(isset($_POST["empl_query"]))
		{
			empl_query();
			$_SESSION['next_stage'] = "empl_result";
		}
	
	
		elseif(isset($_POST["update"]))
		{
			updateform();
			$_SESSION['next_stage'] = "update_finalize";
		}
		else
		{
			create_options();
		}
	}
 
	elseif($_SESSION['next_stage'] == "get_price")
	{
		if(isset($_POST["submit"]))
		{
			get_price();
			$_SESSION['next_stage'] = "price_query";
		}
		elseif(isset($_POST["back_option"]))
		{
			create_options();
			$_SESSION['next_stage'] = "create_options";
		}
	}
	
	elseif($_SESSION['next_stage'] == "price_query")
	{
		if (isset($_POST["back_option"]))
		{
			create_options();
			$_SESSION['next_stage'] = "create_options";
		}
		elseif(isset($_POST["done"]))
		{
			session_destroy();
			session_regenerate_id(TRUE);
			session_start();
			
			create_login();
			$_SESSION['next_stage'] = "Login";
		}
	}
	
	elseif($_SESSION['next_stage'] == "empl_result")
	{
		if (isset($_POST["back_option"]))
		{
			create_options();
			$_SESSION['next_stage'] = "create_options";
		}
		
		elseif(isset($_POST["done"]))
		{
			session_destroy();
			session_regenerate_id(TRUE);
			session_start();
			
			create_login();
			$_SESSION['next_stage'] = "create_login";
		}
	}
	elseif($_SESSION['next_stage'] == "update_finalize")
	{
		if (isset($_POST["back_option"]))
		{
			create_options();
			$_SESSION['next_stage'] = "create_options";
		}
		
		elseif(isset($_POST["submit"]))
		{
			update_call();
			$_SESSION['next_stage'] = "update_query";
		}
	}
	elseif($_SESSION['next_stage'] == "update_query")
	{
		if (isset($_POST["back_option"]))
		{
			create_options();
			$_SESSION['next_stage'] = "create_options";
		}
		
		elseif(isset($_POST["done"]))
		{
			session_destroy();
			session_regenerate_id(TRUE);
			session_start();
			
			create_login();
			$_SESSION['next_stage'] = "create_login";
		}
	}
    else
    {
        ?>
        <p> <strong> YIKES! should NOT have been able to reach
            here! </strong> </p>
        <?php

        session_destroy();
        session_regenerate_id(TRUE);
        session_start();
     
        create_login();
        $_SESSION['next-stage'] = "Login";
    }

    require_once("328footer.html");
?>

</body>
</html>
    