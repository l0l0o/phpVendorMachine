<?php 
require_once('./product/view/partials/header.php');
?>
<h1>Vos produits postés :</h1>

<?php foreach ($products as $myProduct): ?>
    <?php if($myProduct->getIsActive() == true):?>
        <div>
            <h4><?php echo $myProduct->getTitle(); ?></h4>
            <p><?php echo $myProduct->getPrice(); ?>€</p>
            <p><?php echo $myProduct->getDescription(); ?></p>
        </div>
        <br>
    <?php endif; ?>
<?php endforeach; ?>

<?php require_once('./order/view/partials/footer.php'); ?>