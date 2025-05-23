<!--<!DOCTYPE html>-->
<!--<html lang="ro">-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Motociclete</title>

    <!-- FontAwesome pentru iconițe -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            padding: 20px;
            color: white;
            text-align: center;
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

        form {
            max-width: 500px;
            margin: 0 auto;
        }

        fieldset {
            border: 2px solid #ff7e5f;
            padding: 30px;
            border-radius: 12px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        legend {
            font-weight: bold;
            color: #ff7e5f;
            font-size: 1.5rem;
            padding: 0 10px;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 600;
            color: #333;
            font-size: 1rem;
        }

        input[type="username"],
        input[type="password"],
        select:focus
        textarea {
            width: 100%;
            padding: 10px 14px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: #fafafa;
        }

        input[type="username"]:focus,
        input[type="password"]:focus,
        select:focus,
        textarea:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 10px rgba(255,126,95,0.25);
            outline: none;
            background-color: #fff;
        }

        input[type="radio"] {
            margin-right: 6px;
            accent-color: #ff7e5f;
            transform: scale(1.2);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #ff7e5f;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 10px;
            font-size: 1.2rem;
            margin-top: 25px;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
        }

        button:hover {
            background-color: #e66450;
            transform: scale(1.03);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }

        /* Sprite CSS - adaugă imaginea ta sprite.png în același folder și adaptează pozițiile */
        .sprite-icon {
            display: inline-block;
            width: 32px;
            height: 32px;
            background-image: url('sprite.png'); /* imaginea sprite */
            background-repeat: no-repeat;
            vertical-align: middle;
            margin-right: 5px;
        }

        .sprite-home { background-position: 0 0; }
        .sprite-user { background-position: -32px 0; }
        .sprite-lock { background-position: 0 -32px; }
        .sprite-moto { background-position: -32px -32px; }

        /*La hover pe link-urile din meniu, item-ul activ va avea o bordura / un
background care apare cu o animatie de cateva secunde. Variantele pentru meniu sunt
urmatoarele:*/
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            position: relative;
            transition: color 0.3s;
            padding: 8px 10px;
        }

        nav a::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.9);
            transition: width 1.5s;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav a::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            transition: width 1.5s;
            border-radius: 5px;
        }

        nav a:hover::before {
            width: 100%;
        }

        nav a:hover {
            color: #333;
        }

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
            <td colspan="2" class="header">Change password for  <?php echo $GLOBALS['current_userId'] ?><i class="fas fa-user-plus"></i></td>
        </tr>
        <tr>
            <td>
                <form action="apiUser.php" method="post">
                    <fieldset>
                        <legend>Detalii utilizator</legend>
                        <input type="hidden" id="isChangePassword" name="isChangePassword">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $GLOBALS['current_userId'] ?>">
                        <label for="password"><i class="fas fa-lock"></i> Password:</label>
                        <div style="display: flex; align-items: center;">
                            <input type="password" id="password" name="password" required style="flex: 1;">
                            <span id="password-valid" style="width: 15px; height: 15px; margin-left: 10px; border-radius: 50%; background-color: gray;"></span>
                        </div>
                        <button type="submit"><i class="fas fa-user-plus"></i> SAVE</button>
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</main>

<footer>
    <p>&copy; 2025 Magazin Motociclete</p>
</footer>
<script>
// Exemplu: actualizează valoarea câmpului hidden înainte de trimitere
document.querySelector("form").addEventListener("submit", function (e) {
document.getElementById("isChangePassword").value = "true";
 const myUserId = document.getElementById('userId').value;
console.log("myUserId is:", myUserId);  // <-- Add this
});
</script>
<script>
    const parolaInput = document.getElementById('password');
    const indicator = document.getElementById('password-valid');

    function valideazaParola(password) {
        const areLiteraMare = /[A-Z]/.test(password);
        const areLiteraMica = /[a-z]/.test(password);
        const areCifra = /\d/.test(password);
        const areSpecial = /[!]/.test(password);

        return areLiteraMare && areLiteraMica && areCifra && areSpecial;
    }

    parolaInput.addEventListener('input', function () {
        if (valideazaParola(parolaInput.value)) {
            indicator.style.backgroundColor = 'green';
        } else {
            indicator.style.backgroundColor = 'red';
        }
    });
</script>
<script>
    const emailInput = document.getElementById('username');
    const emailIndicator = document.getElementById('username-valid');

    function valideazaEmail(username) {
        // Doar litere, cifre, _ înainte de @
        const pattern = /^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+\.[a-zA-Z]+(\.[a-zA-Z]+)*$/;

        // Verificăm și că există un singur @
        const atCount = (username.match(/@/g) || []).length;

        return pattern.test(username) && atCount === 1;
    }

    emailInput.addEventListener('input', function () {
        if (valideazaEmail(emailInput.value)) {
            emailIndicator.style.backgroundColor = 'green';
        } else {
            emailIndicator.style.backgroundColor = 'red';
        }
    });
</script>
</body>
<!--</html>-->