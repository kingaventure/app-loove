<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
require_once __DIR__ . '/../Model/private_message.php';
require_once __DIR__ . '/../Model/home.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_username'])) {
    header('Location: index.php?component=login');
    exit();
}

$profilId = getIdUser($pdo, $_SESSION['user_username']);
$otherId = isset($_GET['user']) ? intval($_GET['user']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    sendMessage($pdo, $profilId, $otherId, $_POST['message']);
    header("Location: index.php?component=private_message&user=$otherId");
    exit();
}

$messages = getConversation($pdo, $profilId, $otherId);

require_once __DIR__ . '/../../Front-end/View/private_message.php';
?>

<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $msg): ?>
        <!-- ... -->
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun message pour l’instant.</p>
<?php endif; ?>

