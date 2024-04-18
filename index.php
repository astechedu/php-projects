<?php
include 'config/app.php';
?>


<!-- Header -->
<?php include 'partials/header.php'; ?>

<!-- Login and Register -->
<div class="container" id="test">
    <div class="row justify-content-center mt-5">
		<!-- Your content goes here -->
		<?php include 'auth/login.php'; ?>

		<?php include 'auth/register.php'; ?>
    </div>
</div>

<!-- Footer -->
<?php include 'partials/footer.php'; ?>


