<?php require_once('./product/view/partials/header.php'); ?>

<main>
		<form method="POST" action="http://localhost:8888/esd-oop-php/create-product">			
			<select id="title" name="title">
				<option value="tshirt">T-shirt</option>
				<option value="jeans">Jeans</option>
				<option value="shoes">Chaussures</option>
				<option value="short">Short</option>
				<option value="cap">Casquette</option>
				<option value="pull">Pull</option>
			</select>
			<br>
			<input type="number" min="1" max="500">
			<br>
			
			<button type="submit">Ajouter</button>

		</form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>