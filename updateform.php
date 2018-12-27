<?php 
function updateform()
{
	if(! array_key_exists('username', $_SESSION))
	{
		destroy_and_exit("NO USERNAME FOUND");
	}

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $conn = hsu_conn_sess($username, $password);
	
	$stock_query_str = "select stock_item, qty_in_stock
							from Stock";
    $stock_query = oci_parse($conn, $stock_query_str);
    oci_execute($stock_query);
	
?>
     <form method="post"
          action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                   ENT_QUOTES) ?>">      
        <fieldset>
            <legend> Update Stock Quantity </legend>
			<div class="select">
            <select name="stockItem">
            <?php
            while (oci_fetch($stock_query))
            {
                $stockItem = oci_result($stock_query, "STOCK_ITEM");
				$stockQty = oci_result($stock_query, "QTY_IN_STOCK");
                ?>
                <option value="<?= $stockItem ?>"> 
                     <?= $stockItem ?> - <?= $stockQty ?> </option>
                <?php
            }
            ?>
            </select> 
			<p><input type="number" name="new_quant" placeholder="Enter New Value" /></p>
			<p><input type="submit" name="submit" id="confirm" value="Update" /></p>
			<p><input type="submit" name="back_option" value="Back To Options" /></p>
			</div>
		</fieldset>
    </form>
<?php
}
?>