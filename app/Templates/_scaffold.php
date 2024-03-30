<?php ob_start(); ?>

<nav>
</nav>

<main>
    <?= $main ?>
</main>

<footer>

</footer>

<?php $content = ob_get_clean(); ?>
<?php include '_layout.php'; ?>