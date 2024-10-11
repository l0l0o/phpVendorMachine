<?php require_once('./product/view/partials/header.php'); ?>

<main>
	<form method="POST" action="http://localhost:8888/esd-oop-php/create-product">			
		<label for="ProductTitle">Titre :</label><br>
		<input type="text" id="ProductTitle" name="ProductTitle" minlength="3" maxlength="100" required>
		<br><br>

		<label for="ProductPrice">Prix :</label><br>
		<input type="number" min="1" max="500" name="ProductPrice">
		<br><br>

		<label for="ProductDescription">Description :</label><br>
		<input type="text-area" name="ProductDescription">
		<br><br>

		<label for="ProductIsActive">Rendre l'article visible ?</label>
		<input type="checkbox" name="ProductIsActive">
		<br><br>
		
		<button type="submit">Ajouter</button>
	</form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>