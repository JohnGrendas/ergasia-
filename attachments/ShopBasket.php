<?php
session_start();
$con = mysqli_connect("localhost", "id9221508_root", "admin", "id9221508_product_details");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
			    'image_link' => $_POST["hidden_sxolia"],
				'apothema' => $_POST["hidden_apothema"],
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_timi'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
		  'image_link' => $_POST["hidden_sxolia"],
		  'apothema' => $_POST["hidden_apothema"],
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_timi'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="ShopBasket.php"</script>';
			}
		}
	}
}

	if (isset($_GET["action"])){
        if ($_GET["action"] == "add_to_cart"){
            foreach ($_SESSION["shopping_cart"] as $keys => $value){
                if ($value["item_quantity"] == $_GET["quantity"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>window.location="ShopBasket.php"</script>';
                }

            }


        }
    }

?>

<!DOCTYPE html>
<html>
  <head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/Home.css">
 <title>Cart</title>


 </head>


<body>
	<body>
		<span style="font-size:30px; cursor:pointer; color: white" onclick="openNav()">&#9776;</span>
	 <div id="bg">
	 </div>

	<div id="mySidenav" class="sidenav">


				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="float:right;">&times;</a>
				<a href="index.html">Home</a>
				<a href="About.html">About</a>
				<a href="Eshop.html">Eshop</a>
				<a href="Contact.html">Contact</a>

			</div>





		<div id="main">
            <table>

            <tr>

                <th width="30%">Όνομα προ'ι'όντος</th>
                <th width="10%">Ποσότητα</th>
                <th width="13%">Τιμή</th>
                <th width="10%">Σύνολο</th>
                <th width="17%">Διαγραφή Αντικειμένου</th>
            </tr>


            <?php
                if(!empty($_SESSION["shopping_cart"])){
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $key => $value) {
                        ?>
                        <tr>

                           <td> <?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>€ <?php echo $value["item_timi"]; ?></td>
                            <td>
                                € <?php echo number_format($value["item_quantity"] * $value["item_timi"], 2); ?></td>
                            <td class="delete"><a href="ShopBasket.php?action=delete&id=<?php echo $value["item_id"] ?>"><span
                                        class="text-danger ">Διαγραφή</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["item_timi"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Σύνολο:</td>
                            <th align="right">€ <?php echo number_format($total, 2); ?></th>
                            <td></td>

                        </tr>

                        <?php

                    }
                ?>
            </table>

        </div>

<footer>      	<div class="Buy">
	<?php
	   if(!empty($_SESSION["shopping_cart"])){

	 ?>


	  <td><a href="ShopBasket.php?action=add_to_cart&quantity=<?php echo $value["item_quantity"] ?>"><button onclick="alertp()"class="btn-buy ">Αγορά</button></a></td>



	  </div>
	 <?php

	  }
	?>
	</footer>


</body>
</html>
