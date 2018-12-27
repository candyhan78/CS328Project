<?php
function custom_dropdown()
{
    
    if(! array_key_exists('username', $_SESSION))
	{
		destroy_and_exit("NO USERNAME FOUND");
	}
	
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $conn = hsu_conn_sess($username, $password);
	



    $bev_query_str = "select bev_name, bev_size, bev_id
                       from Beverages
                       order by bev_name";

    $bev_query = oci_parse($conn, $bev_query_str);

    oci_execute($bev_query);



    ?>
    <form method="post"
          action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                   ENT_QUOTES) ?>">      
        <fieldset>

            <legend> Select Your Beverage </legend>
            <select name="bev_choice">

            <?php

            while (oci_fetch($bev_query))
            {
                $curr_bev_name = oci_result($bev_query, "BEV_NAME");
                $curr_bev_size = oci_result($bev_query, "BEV_SIZE");
				$curr_bev_id = oci_result($bev_query, "BEV_ID");
                ?>

                <option value="<?= $curr_bev_id ?>"> 

                    <?= $curr_bev_name ?> - <?= $curr_bev_size ?>  
		
				</option>
                <?php
            }
            ?>

            </select> <br />
		<p>
			<input type="submit" name = "submit" value="submit" />   
			<input type="submit" name="back_option" value="Back" />
		</p>
		</fieldset>

        
    </form>

    <?php
    oci_free_statement($bev_query);
    oci_close($conn);
	
}

?>
