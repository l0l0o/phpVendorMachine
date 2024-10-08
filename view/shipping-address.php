<!DOCTYPE html>

<html>
	<head>
		<title>MyShop</title>
	</head>
	<body>

	<header>
		<h1>MyShop</h1>
	</header>
	
	<main>
	
		<form method="POST" action="../controller/set-shipping-address.php">

            <label for="shippingAddress">Adresse</label>
            <input type="text" id="shippingAddress" name="shippingAddress" required>
            <br>
            <label for="shippingCity">Ville</label>
            <input type="text" id="shippingCity" name="shippingCity" required>
            <br>
            <label for="shippingCountry">Pays</label>
            <input type="text" id="shippingCountry" name="shippingCountry" required>
            <br>

			<button type="submit">Continuer</button>

		</form>

	</main>

	</body>
</html>