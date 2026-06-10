<?php
session_start();
echo "<h2>Session Audit</h2>";

if (isset($_SESSION['user'])) {
    echo "<p>✅ Active session found for user: <strong>" . htmlspecialchars($_SESSION['user']) . "</strong></p>";
} else {
    echo "<p>⚠️ No active session. (This is normal if you haven't logged in yet.)</p>";
}

if (is_writable(__DIR__)) {
    echo "<p>✅ Directory permissions are correct.</p>";
} else {
    echo "<p>❌ Directory is not writable; sessions may fail to save.</p>";
}
?>