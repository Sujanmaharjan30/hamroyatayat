<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php 

    $uri = parse_url($_SERVER["REQUEST_URI"])['path'];

    
    // Remove "/HamroYatayat" from URI
    $uri = str_replace('/HamroYatayat', '', $uri);
    
    $style;
    switch($uri){
        case "/" : $style = 'style.css';
        break;
        case "/index.php" : $style = 'style.css';
        break;
        case "/register.php" : $style = 'register.css';
        break;
        case "/login.php" : $style = 'login.css';
        break;
        case "/logout.php" : $style = 'logout.css';
        break;
        case "/signup.php" : $style = 'signup.css';
        break;
        case "/aboutUs.php" : $style = 'aboutUs.css';
        break;
        case "/contact.php" : $style = 'contact.css';
        break;
        case "/morning.php" : $style = 'morning.css';
        break;
        case "/night.php" : $style = 'night.css';
        break;
        case "/admin.php" : $style = 'admin.css';
        break;
        case "/addBookingForm.php" : $style = 'addBookingForm.css';
        break;
        case "/seat.php" : $style = 'seat.css';
        break;
        case "/choose.php" : $style = 'choose.css';
        break;
        case "/tourist_seat_arrangement.php" : $style = 'tourist_seat_arrangement.css';
        break;
        case "/van_seat_arrangement.php" : $style = 'van_seat_arrangement.css';
        break;
        case "/vip_seat_arrangement.php" : $style = 'vip_seat_arrangement.css';
        break;
        case "adminlogin.php" : $style = 'adminlogin.css';
         break;
         case "details.php" : $style = 'details.css';
         break;
        default : echo "no coresponding style found";
    }
    function linkPage($page){
        return $page . '.php';
    }
    
    
    ?>

<link rel="stylesheet" href="css/<?php echo $style ?>" >
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>