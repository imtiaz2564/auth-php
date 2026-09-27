<?php
$pageTitle = 'Home';
$pageClass = 'page-home';
$pageStylesheet = 'assets/css/home.css';
include __DIR__ . '/layouts/header.php';
?>



<section class="hero">

    <h1>Welcome to Authentication</h1>

    <?php if (isset($_SESSION['email'])): ?>
        <p>Welcome back! You are signed in. Visit your account.</p>
        <div class="buttons">
            <a href="index.php?act=account" class="btn signin">My Account</a>
        </div>
    <?php else: ?>
    <p>
        Sign in to your account or create a new account to get started.
    </p>

    <div class="buttons">

        <a
            href="index.php?act=loginView"
            class="btn signin"
        >
            Sign In
        </a>

        <a
            href="index.php?act=registrationView"
            class="btn signup"
        >
            Sign Up
        </a>

    </div>

    <?php endif; ?>

</section>

<?php
include __DIR__ . '/layouts/footer.php';
?>
