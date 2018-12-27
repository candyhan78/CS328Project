
<?php


function get_price()
{
    
   
    if ( (! array_key_exists("bev_choice", $_POST)) or
         ($_POST["bev_choice"] == "") or
         (! isset($_POST["bev_choice"])) )
    {
        destroy_and_exit("must select a beverage");
    }

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    
    $conn = hsu_conn_sess($username, $password);
 

    $bev_choice = htmlspecialchars(strip_tags($_POST["bev_choice"]));

    $bev_price_str = "select bev_name, bev_size, bev_price
		      from Beverages
		      where bev_id = :bev_choice";


    $bev_price_stmt = oci_parse($conn, $bev_price_str);

    oci_bind_by_name($bev_price_stmt, ":bev_choice", $bev_choice);

    oci_execute($bev_price_stmt);    

    oci_fetch($bev_price_stmt);
    
    $chosen_bev_name = oci_result($bev_price_stmt, "BEV_NAME");
    $chosen_bev_size = oci_result($bev_price_stmt, "BEV_SIZE"); 
    $chosen_bev_price = oci_result($bev_price_stmt, "BEV_PRICE");	
   
    oci_free_statement($bev_price_stmt);                
    oci_close($conn);

    
    ?>
    <form method="post"
          action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                   ENT_QUOTES) ?>">      
        <fieldset>
            <legend> Bev detail: <?= $bev_choice ?></legend>
			<ul>
				<li> Bev Name: <?= $chosen_bev_name ?> </li>
				<li> Bev Size: <?=  $chosen_bev_size ?> </li>
				<li> Bev Price: <?= $chosen_bev_price ?> </li>
					
			</ul>
		
        <input type="submit" name="done" value="Done" />
        <input type="submit" name="back_option" value="Back to Options" />
	</fieldset>
   </form>
     <?php
	
}
?>
