<?php
session_start();

// Mot de passe admin (à modifier si besoin)
$ADMIN_PASSWORD = 'adminreset2024';

if (isset($_POST['password'])) {
    if ($_POST['password'] === $ADMIN_PASSWORD) {
        $_SESSION['admin_auth'] = true;
        header('Location: admin.html');
        exit();
    } else {
        $error = 'Mot de passe incorrect';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { background: #e0eafc; font-family: 'Segoe UI', Arial, sans-serif; }
        .login-box {
            max-width: 340px; margin: 80px auto; background: #fff; border-radius: 12px;
            box-shadow: 0 4px 24px #0002; padding: 32px 24px;
        }
        h2 { text-align: center; color: #2a3d66; margin-bottom: 24px; }
        input[type="password"] {
            width: 100%; padding: 12px; border: 1px solid #bcd0ee; border-radius: 6px;
            font-size: 1.1rem; margin-bottom: 18px; background: #f7faff;
        }
        button {
            width: 100%; padding: 12px; border: none; border-radius: 6px;
            background: #007bff; color: #fff; font-size: 1.1rem; font-weight: bold;
            cursor: pointer; transition: background 0.2s;
        }
        button:active { background: #0056b3; }
        .error { color: #d90429; text-align: center; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Connexion Admin</h2>
        <?php if (isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
        <form method="post">
            <input type="password" name="password" placeholder="Mot de passe admin" required autofocus>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>