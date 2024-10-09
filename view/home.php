<?php require_once '../partials/header.php' ?>

	<main>	
		<form method="POST" action="../controller/create-order.php">

			<label for="customerName">Nom du client</label>
			<br>
			<input type="text" id="customerName" name="customerName" required>

			<br><br>

			<label for="product">Produit</label>
			<br>
			<select id="products[]" name="products[]" multiple>
				<option value="tshirt">T-shirt</option>
				<option value="jeans">Jeans</option>
				<option value="shoes">Chaussures</option>
				<option value="short">Short</option>
				<option value="cap">Casquette</option>
				<option value="pull">Pull</option>
				<option value="pull">P</option>
			</select>

			<br><br>

			<button type="submit">Ajouter</button>

		</form>

	</main>

	</body>
</html>