<?php 
    session_start();

    include 'data.php';

    $fname = "";
    $lname = "";
    $em = "";
    $em2 = "";
    $password = "";
    $password2 = "";
    $date = "";
    $error_array = '';

    if(isset($_POST['register_button']))
    {
        $fname = strip_tags($_POST['reg_fname']);
        $lname = str_replace(' ', '', $fname);
        $fname = ucfirst(strtolower($fname));
        $_SESSION['reg_fname'] = $fname;

        $lname = strip_tags($_POST['reg_lname']);
        $lname = str_replace(' ', '', $lname);
        $lname = ucfirst(strtolower($lname));
        $_SESSION['reg_lname'] = $lname;

        $em = strip_tags($_POST['reg_email']);
        $em = str_replace(' ', '', $em);
        $em = ucfirst(strtolower($em));
        $_SESSION['reg_email'] = $em;

        $em2 = strip_tags($_POST['reg_email2']);
        $em2 = str_replace(' ', '', $em2);
        $em2 = ucfirst(strtolower($em2));
        $_SESSION['reg_email2'] = $em2;

        $password = strip_tags($_POST['reg_password']);

        $password2 = strip_tags($_POST['reg_password2']);

        $date = date("Y-m-d");

        if($em == $em2)
        {
            if(filter_var($em, FILTER_VALIDATE_EMAIL))
            {
                $em = filter_var($em, FILTER_VALIDATE_EMAIL);
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$em'");
                $num_rows = mysqli_num_rows($e_check);

                if($num_rows > 0)
                {
                    $error_array = "Email already in use";
                }
            }
            else 
            {
                $error_array = 'Invalid format for email';
            }
        }
        else 
        {
            $error_array =  "Emails don't match";
        }

        if(strlen($fname) > 10 || strlen($fname) < 3)
        {
            $error_array = "Your first name must be between 3 and 10 characters";
        }
        if(strlen($lname) > 10 || strlen($lname) < 3)
        {
            $error_array = "Your last name must be between 3 and 10 characters";
        }
        if($password != $password2)
        {
            $error_array = "Your passwords do not match";
        }
        else 
        {
            if(preg_match('/[^A-Za-z0-9]/', $password))
            {
                $error_array = "Your password can only contain english characters or numbers";
            }
        }

        if(strlen($password > 30) || strlen($password) < 5)
        {
            $error_array = "Your password must be between 5 and characters";
        }


    }
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
<style>
    footer
    {
        position: fixed;
        bottom: 0;
        left: 0;
        height: 45px;
        width: 100%;
        background-color: white;
    }
    header
    {
        height: 45px;
        width: 100%;
        border-bottom: 1px solid #dee2e6 !important;
        background-color: white;
    }
    .__suplnk
    {
        margin-top: 8px;
    }
    .error
    {
        width: 100%;
        background-color: #ff6347;
        text-align: center;
        position: fixed; 
        top: 0;
        left: 0;
        transition: all 4s ease-in-out;
    }
    .error p 
    {
        font-size: 18px;
        margin-top: 10px;
    }
</style>
    <header>
        <svg class="edgesvg" width="24" height="24" viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></g></svg>
        <div style="width: 83%; height: 50px;"></div>
        <svg class="__stglog" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
        </svg>
    </header>
    <app-logo>
        <h1>Inner Circle</h1>
    </app-logo>
    <app-body>
        <app-form>
            <form method="POST" class="" action="signup.php">
            <?php
                if(isset($error_array)) {
                    echo '<div class="error"><p style="color: white; font-weight; 600;">' . $error_array . '</p></div>';
                }
            ?>
                <input type="text" name="reg_fname" placeholder="First Name" class="__full_sign border" value="<?php 
                    if(isset($_SESSION['reg_fname']))
                    {
                        echo $_SESSION['reg_fname'];
                    }
                ?>" required>
                <input type="text" name="reg_lname" placeholder="Last Name" class="__full_sign border" value="<?php 
                    if(isset($_SESSION['reg_lname']))
                    {
                        echo $_SESSION['reg_lname'];
                    }
                ?>" required>
                <input type="email" name="reg_email" placeholder="Email Address" class="__e_sign border" value="<?php 
                    if(isset($_SESSION['reg_email']))
                    {
                        echo $_SESSION['reg_email'];
                    }
                ?>" required>
                <input type="email" name="reg_email2" placeholder="Confirm Email Address" class="__e_sign border" value="<?php 
                    if(isset($_SESSION['reg_email2']))
                    {
                        echo $_SESSION['reg_email2'];
                    }
                ?>" required>
                <input type="password" name="reg_password" placeholder="Password" class="__p_sign border" value="<?php 
                    if(isset($_SESSION['reg_password']))
                    {
                        echo $_SESSION['reg_password'];
                    }
                ?>" required>
                <input type="password" name="reg_password2" placeholder="Confirm Password" class="__p_sign border" value="<?php 
                    if(isset($_SESSION['reg_password2']))
                    {
                        echo $_SESSION['reg_password2'];
                    }
                ?>" required>
                <input type="submit" name="register_button" value="Next" class="__S_sign">
            </form>
        </app-form>
        <div style="height: 50px; width: 100%;"></div>
        <footer class="border-top">
            <p class="__suplnk">Already have an account? click here <a href="<?php echo B_U; ?>">Log In</a></p>
        </footer>
    </app-body>
</body>
</html>