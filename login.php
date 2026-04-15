<?php
session_start();
include 'konexioa.php';

$mezua = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $pasahitza = $_POST['pasahitza'];

    $sql = $conn->prepare("SELECT id, pasahitza FROM bezeroak WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $emaitza = $sql->get_result();

    if ($emaitza->num_rows === 1) {
        $erabiltzailea = $emaitza->fetch_assoc();

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

<?php include 'header.html'; ?>

<h2>Saioa hasi</h2>

<?php if (!empty($mezua)) echo "<p style='color:red;'>$mezua</p>"; ?>

<form action="" method="POST">
    <label for="email">Emaila:</label>
    <input type="email" name="email" required>

    <label for="pasahitza">Pasahitza:</label>
    <input type="pasahitza" name="pasahitza" required>

    <button type="submit">Sartu</button>
</form>