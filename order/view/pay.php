<?php require_once('./common/view/partials/header.php'); ?>
	
	<main>
		<p>Payer la commande (c'est même pas débité sur votre compte. Ou peut être que si. Mais faites confiance) </p>


		<form method="POST" action="http://localhost:8888/esd-oop-php/process-payment">

			<label for="payment"></label>

			<button type="submit">Payer</button>

		</form>
	</main>

<?php require_once('./common/view/partials/footer.php'); ?>