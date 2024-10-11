<?php require_once('./common/view/partials/header.php'); ?>
<main>

	<?php if (!empty($products)): ?>
		<form method="POST" action="http://localhost:8888/esd-oop-php/create-order">

			<label for="customerName">Nom du client</label>
			<input type="text" id="customerName" name="customerName" required>
			<br>

			<label for="products">Produit</label>

				<select id="product" name="productsId[]" multiple>
					<?php foreach ($products as $product):?>
						<?php 
							if ($product->getIsActive() == true) {
								$productId = $product->getId(); 
								$productTitle = $product->getTitle();
								echo "<option value='{$productId}'>{$productTitle}</option>";
							}
						?>				
					<? endforeach; ?>
				</select>
				<br>
				
				<button type="submit">Ajouter</button>
				
			</form>
	<? else :?>
		<p>Il n'y a aucun article en vente.</p>
	<? endif?>

</main>

<?php require_once('./common/view/partials/footer.php'); ?>