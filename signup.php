<?php require __DIR__ . '/includes/bootstrap.php';
$error = '';
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf();
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    $name = trim($_POST['full_name'] ?? '');
    if (strlen($name) < 2 || strlen($name) > 100)
        $error = 'Enter a name between 2 and 100 characters.';
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $error = 'Enter a valid email address.';
    elseif (strlen($password) < 8 || strlen($password) > 72)
        $error = 'Use a password between 8 and 72 characters.';
    elseif ($password !== ($_POST['confirm_password'] ?? ''))
        $error = 'Your passwords do not match.';
    else {
        try {
            $q = db()->prepare('INSERT INTO users(full_name,email,password_hash) VALUES(?,?,?)');
            $q->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
            session_regenerate_id(true);
            $_SESSION['user_id'] = (int) db()->lastInsertId();
            header('Location: dashboard.php');
            exit;
        } catch (PDOException $e) {
            $error = $e->getCode() === '23000' ? 'This email is already registered. Please log in.' : 'Registration is unavailable. Please check your database setup.';
        }
    }
}
$title = 'Create your user account | Django Girls';
require __DIR__ . '/includes/header.php'; ?>
<main class="wrap">
    <section class="auth">
        <div class="eyebrow">Your journey starts here</div>
        <h1>Create your account.</h1>
        <p>A small step towards your next big idea.</p><?php if ($error): ?>
            <p class="error" role="alert"><?= esc($error) ?></p><?php endif; ?>
        <form method="post"><input type="hidden" name="csrf" value="<?= esc($_SESSION['csrf']) ?>"><label
                for="name">Full name</label><input id="name" name="full_name" autocomplete="name" required minlength="2"
                maxlength="100" value="<?= esc($name ?? '') ?>"><label for="email">Email address</label><input id="email"
                name="email" type="email" autocomplete="email" required value="<?= esc($email) ?>"><label
                for="password">Password</label>
            <div class="password"><input id="password" name="password" type="password" autocomplete="new-password"
                    required minlength="8" maxlength="72"><button type="button" data-password="password">Show</button>
            </div>
            <p class="note">Use between 8 and 72 characters.</p><label for="confirm">Confirm password</label><input
                id="confirm" name="confirm_password" type="password" autocomplete="new-password" required><button
                class="btn orange full" type="submit">Create account ↗</button>
        </form>
        <p class="note">Already a member? <a href="login.php">Log in</a></p>
    </section>
</main><?php require __DIR__ . '/includes/footer.php'; ?>