<?php
$pageTitle = 'My Account';
$pageClass = 'page-home';
$pageStylesheet = 'assets/css/home.css';
include __DIR__ . '/layouts/header.php';
?>
<section class="hero">
    <h1>My Account</h1>
    <p>You are signed in as <?= htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') ?>.</p>
</section>
<?php include __DIR__ . '/layouts/footer.php'; ?>
