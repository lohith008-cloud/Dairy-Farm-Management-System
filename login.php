<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['role'] == 'admin') {
        header('location: pages/admin-dashboard.php');
        exit;
    } elseif ($_SESSION['role'] == 'staff') {
        header('location: pages/staff-dashboard.php');
        exit;
    }
}
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    if ($user == 'admin' && $pass == 'admin123') {
        $_SESSION['user'] = 'admin';
        $_SESSION['role'] = 'admin';
        header('location: pages/admin-dashboard.php');
        exit;
    } elseif ($user == 'staff1' && $pass == 'staff123') {
        $_SESSION['user'] = 'staff1';
        $_SESSION['role'] = 'staff';
        header('location: pages/staff-dashboard.php');
        exit;
    } else {
        $msg = 'Invalid credentials';
    }
}
?>
<html><head><meta charset="UTF-8"><title>Farm Login</title>
<style>body{background:#667eea;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0;font-family:Arial}.box{background:white;padding:40px;border-radius:8px;width:350px;box-shadow:0 10px 25px rgba(0,0,0,0.2)}h1{text-align:center;color:#333;margin-bottom:30px}.err{background:#f8d7da;color:#721c24;padding:12px;border-radius:5px;margin-bottom:20px}input{width:100%;padding:12px;margin-bottom:15px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px}button{width:100%;padding:12px;background:#667eea;color:white;border:none;border-radius:5px;font-weight:bold;cursor:pointer;font-size:16px}button:hover{background:#764ba2}</style></head><body>
<div class="box">
<h1>Dairy Farm Login</h1>
<?php echo (isset($msg) && $msg != '' ? '<div class="err">'.$msg.'</div>' : ''); ?>
<form method="POST">
<input type="text" name="user" placeholder="Username" required="">
<input type="password" name="pass" placeholder="Password" required="">
<button type="submit">Login</button>
</form>
</div>
</body></html>
