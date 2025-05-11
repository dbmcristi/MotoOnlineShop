<!--<!DOCTYPE html>-->
<!--<html lang="ro">-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Motociclete</title>
   <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            padding: 20px;
            color: white;
            text-align: center;
            position: relative;
        }

        header h1 {
            margin: 0;
            font-size: 3rem;
            display: inline-block;
            transition: transform 0.5s ease, rotate 0.5s ease;
            cursor: pointer;
        }

        header h1:hover {
            transform: scale(1.2) rotate(5deg);
        }

        nav {
            margin-top: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #333;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
        }

        .header {
            background-color: #feb47b;
            font-weight: bold;
            color: white;
            text-align: center;
            font-size: 1.2rem;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }

        legend {
            font-weight: bold;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #ff7e5f;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        button:hover {
            background-color: #e66450;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }

        /* Sprite CSS */
        .sprite-icon {
            display: inline-block;
            width: 32px;
            height: 32px;
            background-image: url('sprite.png');
            background-repeat: no-repeat;
            vertical-align: middle;
            margin-right: 5px;
        }

        .sprite-home { background-position: 0 0; }
        .sprite-user { background-position: -32px 0; }
        .sprite-lock { background-position: 0 -32px; }
        .sprite-moto { background-position: -32px -32px; }
        nav ul.menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul.menu > li {
            position: relative;
            margin: 0 15px;
        }

        nav ul.menu > li > a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            display: block;
            position: relative;
            transition: color 0.3s;
        }

        nav ul.menu > li > a:hover {
            color: #333;
        }

        nav ul.menu li ul.submenu {
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(255, 126, 95, 0.95);
            border-radius: 0 0 10px 10px;
            list-style: none;
            padding: 0;
            margin: 0;
            min-width: 150px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.4s ease;
            z-index: 99;
        }

        nav ul.menu li:hover ul.submenu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        nav ul.menu li ul.submenu li a {
            color: white;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            transition: background 0.3s;
        }

        nav ul.menu li ul.submenu li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

   </style>
</head>
<body>
<?php
include 'header.php';
?>
    
    <main>
        <table>
            <tr>
                <td colspan="2" class="header">BUN VENIT</td>
            </tr>
        </table>
    </main>

    <footer>
        <p>&copy; 2025 Magazin Motociclete</p>
    </footer>
</body>
<!--</html>-->

