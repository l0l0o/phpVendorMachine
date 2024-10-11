<?php require_once('./common/view/partials/header.php'); ?>
	
	<main>
		<p>Choisissez la méthode livraison : </p>


		<form method="POST" action="http://localhost:8888/esd-oop-php/process-shipping-method">

		<label for="shippingMethod">Méthode de livraison</label>

			<select id="shippingMethod" name="shippingMethod">
				<option value="Chronopost Express">Chronopost Express</option>
				<option value="Point relais">Point relais</option>
				<option value="Domicile">Domicile</option>

			</select>

			<button type="submit">Envoyer</button>

		</form>
	</main>

<?php require_once('./common/view/partials/footer.php'); ?>