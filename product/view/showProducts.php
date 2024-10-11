<?php 
require_once('./common/view/partials/header.php');
?>
<h1>Vos produits postés :</h1>

<?php foreach ($products as $key =>$myProduct): ?>
    <?php if($myProduct->getIsActive() == true):?>
        <div>
            <?php 
                $productId = $myProduct->getId(); 
                $productTitle = $myProduct->getTitle();
            ?>
            <h4><?php echo htmlspecialchars($myProduct->getTitle()); ?></h4>
            <p><?php echo htmlspecialchars($myProduct->getPrice()); ?>€</p>
            <p><?php echo htmlspecialchars($myProduct->getDescription()); ?></p>
            <button><?php echo "<a href='http://localhost:8888/esd-oop-php/delete-product?id={$productId}&title={$productTitle}'>Supprimer l'annonce</a>" ?></button>
        </div>
        <br>
    <?php endif; ?>
<?php endforeach; ?>

<?php require_once('./common/view/partials/footer.php'); ?>