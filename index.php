<?php
    include 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="complete.css">
    <title>Inner Circle</title>
</head>
<body>
    <header>
        <svg class="edgesvg" width="24" height="24" viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></g></svg>
        <div style="width: 83%; height: 50px;"></div>
        <svg class="__stglog" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
        </svg>
    </header>
    <app-logo>
        <h1>Inner Circle</h1>
    </app-logo>
    <app-body>
        <app-form>
            <form method="POST">
                <input type="email" placeholder="Email Address" class="__e_log border">
                <input type="password" placeholder="Password" class="__p_log border">
                <input type="submit" value="Log In" class="__S_log">
                <p class="forgot">Forgotten your login details? <a class="__fgt_lnk" href="">Get help with logging in.</a></p>
            </form>
        </app-form>
        <footer class="border-top">
            <p class="__suplnk">Don't have an account? click here <a href="<?php echo B_U; ?>">Sign Up</a></p>
        </footer>
    </app-body>
</body>
</html>