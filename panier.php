<?php require 'header.php'; ?>
<div class="checkout">
	<div class="title">
		<div class="wrap">
		<h2 class="first">Shopping Cart</h2>
		</div>
	</div>
	<form method="post" action="panier.php">
	<div class="table">
		<div class="wrap">

			<div class="rowtitle">
				<span class="name">Product name</span>
				<span class="price">Price</span>
				<span class="quantity">Quantity</span>
				<span class="subtotal">Prix avec TVA</span>
				<span class="action">Actions</span>
			</div>

			<?php
			$ids = array_keys($_SESSION['panier']);
			if(empty($ids)){
				$products = array();
			}else{
				$products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
			}
			foreach($products as $product):
			?>
			<div class="row">
				<a href="#" class="img"> <img src="img/<?= $product->id; ?>.jpg" height="53"></a>
				<span class="name"><?= $product->name; ?></span>
				<span class="price"><?= number_format($product->price,2,',',' '); ?> €</span>
				<span class="quantity"><input type="text" name="panier[quantity][<?= $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id]; ?>"></span>
				<span class="subtotal"><?= number_format($product->price * 1.196,2,',',' '); ?> €</span>
				<span class="action">
					<a href="panier.php?delPanier=<?= $product->id; ?>" class="del"><img src="img/del.png"></a>
				</span>
			</div>
			<?php endforeach; ?>
			<div class="rowtotal">
				Grand Total : <span class="total"><?= number_format($panier->total() * 1.196,2,',',' '); ?> € </span>
			</div>
			<input type="submit" value="Recalculer">
		</div>
	</div>
	</form>
</div>
<?php require 'footer.php'; ?>

