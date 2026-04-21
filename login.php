<?php
include 'konexioa.php';
session_start();

$mezua = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $pasahitza = $_POST['pasahitza'];

    $stmt = $conn->prepare("SELECT id, pasahitza FROM bezeroak WHERE email = ?");
    $stmt->execute([$email]);
    $erabiltzailea = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($erabiltzailea) {
        if (password_verify($pasahitza, $erabiltzailea['pasahitza'])) {
            $_SESSION['bezero_id'] = $erabiltzailea['id'];
            header("Location: panel.php");
            exit();
        } else {
            $mezua = "Pasahitza okerra";
        }
    } else {
        $mezua = "Ez da erabiltzaile hori existitzen";
    }
}
?>

<?php include 'header.php'; ?>

<h2>Saioa hasi</h2>

<?php if (!empty($mezua)) echo "<p style='color:red;'>$mezua</p>"; ?>

<form action="" method="POST">
    <label for="email">Emaila:</label>
    <input type="email" name="email" required>

    <label for="pasahitza">Pasahitza:</label>
    <input type="password" name="pasahitza" required>

    <button type="submit">Sartu</button>
</form>
