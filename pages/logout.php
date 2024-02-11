<?php
try {
    session_start();
    session_destroy();
    
    // Rediriger vers la page index.php
    header("Location: index.php");
    exit;
} catch (Exception $e) {
    $message = $e->getMessage();
    echo ''. $message .'';
}
?>