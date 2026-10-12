<?php require __DIR__ . '/includes/bootstrap.php';
$error = '';
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf();
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    if (time() < ($_SESSION['retry_after'] ?? 0))
        $error = 'Too many attempts. Please try again in a minute.';
    else {
        $q = db()->prepare('SELECT * FROM users WHERE email=?');
        $q->execute([$email]);
        $user = $q->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = (int) $user['id'];
            unset($_SESSION['attempts'], $_SESSION['retry_after']);
            header('Location: dashboard.php');
            exit;
        }
        $_SESSION['attempts'] = ($_SESSION['attempts'] ?? 0) + 1;
        if ($_SESSION['attempts'] >= 5) {
            $_SESSION['retry_after'] = time() + 60;
            $_SESSION['attempts'] = 0;
        }
        $error = 'Email or password is incorrect.';
    }
}
$title = 'Welcome back | Django Girls';
require __DIR__ . '/includes/header.php'; ?>
<main class="wrap">
    <section class="auth">
        <div class="eyebrow">Keep your curiosity growing</div>
        <h1>Welcome back.</h1>
        <p>Enter your details to access your dashboard.</p><?php if ($error): ?>
            <p class="error" role="alert"><?= esc($error) ?></p><?php endif; ?>
        <form method="post"><input type="hidden" name="csrf" value="<?= esc($_SESSION['csrf']) ?>"><label
                for="email">Email address</label><input id="email" name="email" type="email" autocomplete="email"
                required value="<?= esc($email) ?>"><label for="password">Password</label>
            <div class="password"><input id="password" name="password" type="password" autocomplete="current-password"
                    required><button type="button" data-password="password">Show</button></div><button
                class="btn orange full" type="submit">Log in →</button>
        </form>
        <p class="note">New here? <a href="signup.php">Create an account</a></p>
    </section>
</main><?php require __DIR__ . '/includes/footer.php'; ?>