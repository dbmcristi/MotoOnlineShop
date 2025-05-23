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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
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

        input[type="email"],
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

        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus,
        textarea:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 10px rgba(255, 126, 95, 0.25);
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        .sprite-home {
            background-position: 0 0;
        }

        .sprite-user {
            background-position: -32px 0;
        }

        .sprite-lock {
            background-position: 0 -32px;
        }

        .sprite-moto {
            background-position: -32px -32px;
        }

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
            <td colspan="2" class="header">Inregistrare <i class="fas fa-user-plus"></i></td>
        </tr>
        <tr>
            <td>
                <!--                <form action="welcome.php" method="POST">-->
                <!--                    Name: <input type="text" name="name"><br>-->
                <!--                    E-mail: <input type="text" name="email"><br>-->
                <!--                    <input type="submit">-->
                <!--                </form>-->
                <form action="apiUser.php" method="post">
                    <fieldset>
                        <legend>Detalii utilizator</legend>
                        <label for="username"><i class="fas fa-envelope"></i> Email:</label>
                        <div style="display: flex; align-items: center;">
                            <input type="username" id="username" name="username" required style="flex: 1;">
                            <span id="username-valid"
                                  style="width: 15px; height: 15px; margin-left: 10px; border-radius: 50%; background-color: gray;"></span>
                        </div>
                        <label for="password"><i class="fas fa-lock"></i> Parola:</label>
                        <div style="display: flex; align-items: center;">
                            <input type="password" id="password" name="password" required style="flex: 1;">
                            <span id="password-valid"
                                  style="width: 15px; height: 15px; margin-left: 10px; border-radius: 50%; background-color: gray;"></span>
                        </div>
                        <label for="phone">Telefon:</label>
                        <div style="display: flex; align-items: center;">
                            <input type="text" id="phone" name="phone" placeholder="(+40) 777 777 777" required
                                   style="flex: 1;">
                            <span id="phone-valid"
                                  style="width: 15px; height: 15px; margin-left: 10px; border-radius: 50%; background-color: gray;"></span>
                        </div>

                        <label type="tip"><i class="fas fa-user-tag"></i> Tip utilizator:</label>
                        <label for="client">Client</label>
                        <input type="radio" id="client" name="type" value="client" required>
                        <label for="magazin">Magazin</label>
                        <input type="radio" id="magazin" name="type" value="magazin">
                        <input type="hidden" id="type" name="type">
                        <input type="hidden" id="isLogin" name="isLogin">

                        <label for="address">Adresa:</label>
                        <input type="text" id="address" name="address">

                        <button type="submit"><i class="fas fa-user-plus"></i> Înregistrează-te</button>
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
    <ol id="myList">
        <li class="active">
            <div>Primul element al listei.</div>
            <a href="#">Read more</a>
        </li>
        <li>
            <div>Al doilea element al listei.</div>
            <a href="#">Read more</a>
        </li>
        <li>
            <div>Al treilea element al listei.</div>
            <a href="#">Read more</a>
        </li>
        <li>
            <div>Al patrulea element al listei.</div>
            <a href="#">Read more</a>
        </li>
    </ol>

    <div class="controls">
        <button id="prevBtn">Previous</button>
        <button id="nextBtn">Next</button>
    </div>
</main>

<footer>
    <p>&copy; 2025 Magazin Motociclete</p>
</footer>
<!--<script>-->
<!--    fetch('your-api-endpoint.php')-->
<!--        .then(response => response.json())-->
<!--        .then(data => {-->
<!--            if (data.error) {-->
<!--                alert("Error: " + data.error);-->
<!--            } else {-->
<!--                // Handle success-->
<!--            }-->
<!--        })-->
<!--        .catch(err => {-->
<!--            alert("Unexpected error: " + err.message);-->
<!--        });-->
<!--</script>-->
<script>
    // Aceasta funcție poate fi apelată, de exemplu, la trimiterea formularului
    function getSelectedRadioValue() {
        const selected = document.querySelector('input[name="type"]:checked');
        if (selected) {
            console.log("Valoarea selectată:", selected.value);
            return selected.value;
        } else {
            console.log("Niciun radio button nu este selectat.");
            return null;
        }
    }

    // Exemplu: actualizează valoarea câmpului hidden înainte de trimitere
    document.querySelector("form").addEventListener("submit", function (e) {
        const selectedValue = getSelectedRadioValue();
        if (selectedValue) {
            document.getElementById("type").value = selectedValue;
            document.getElementById("isLogin").value = "false";
        }
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
<script>
    const input1 = document.getElementById('input1');
    const input2 = document.getElementById('input2');
    const valid1 = document.getElementById('valid1');
    const valid2 = document.getElementById('valid2');

    function esteValid(text) {
        // Doar litere mici și cifre
        return /^[a-z0-9]+$/.test(text);
    }

    function actualizeazaIndicator(input, indicator) {
        if (esteValid(input.value)) {
            indicator.style.backgroundColor = 'green';
        } else {
            indicator.style.backgroundColor = 'red';
        }
    }

    input1.addEventListener('input', () => actualizeazaIndicator(input1, valid1));
    input2.addEventListener('input', () => actualizeazaIndicator(input2, valid2));
</script>
<script>
    const telefonInput = document.getElementById('phone');
    const telefonValid = document.getElementById('phone-valid');

    function valideazaTelefon(val) {
        const normalizat = val.replace(/\s+/g, '');

        const pattern = /^(\+40\d{9}|0\d{9}|\(\+40\)\d{9}|\(40\)\d{9}|\+\(40\)\d{9})$/;
        return pattern.test(normalizat);
    }

    telefonInput.addEventListener('input', function () {
        if (valideazaTelefon(telefonInput.value)) {
            telefonValid.style.backgroundColor = 'green';
        } else {
            telefonValid.style.backgroundColor = 'red';
        }
    });
</script>
<script>
    function valideaza(dataString, format) {
        let zi, luna, an;
        const delimitator = format.includes('/') ? '/' : '-';
        const dataParts = dataString.split(delimitator);
        const formatParts = format.split(delimitator);

        if (dataParts.length !== formatParts.length) {
            return false;
        }

        for (let i = 0; i < formatParts.length; i++) {
            if (formatParts[i] === 'zz') zi = parseInt(dataParts[i], 10);
            else if (formatParts[i] === 'll') luna = parseInt(dataParts[i], 10);
            else if (formatParts[i] === 'aaaa') an = parseInt(dataParts[i], 10);
            else if (formatParts[i] === 'aa') {
                an = parseInt(dataParts[i], 10);
                an += (an < 50 ? 2000 : 1900); // Ex: 97 -> 1997, 23 -> 2023
            }
        }

        if (isNaN(zi) || isNaN(luna) || isNaN(an) || luna < 1 || luna > 12) {
            return false;
        }

        const zileInLuna = new Date(an, luna, 0).getDate();

        return zi >= 1 && zi <= zileInLuna;
    }

    function valideazaData() {
        const data = document.getElementById('data').value;
        const format = document.getElementById('format').value;
        const rezultat = document.getElementById('rezultat');

        if (valideaza(data, format)) {
            rezultat.textContent = "✅ Dată validă!";
            rezultat.className = "valid";
        } else {
            rezultat.textContent = "❌ Dată invalidă!";
            rezultat.className = "invalid";
        }
    }
</script>
<script>
    const dateRomania = {
        "Cluj": ["Cluj-Napoca", "Turda", "Dej", "Gherla"],
        "Timiș": ["Timișoara", "Lugoj", "Sânnicolau Mare"],
        "Iași": ["Iași", "Pașcani", "Hârlău"],
        "București": ["Sector 1", "Sector 2", "Sector 3", "Sector 4"],
        "Constanța": ["Constanța", "Mangalia", "Medgidia"],
    };

    const judetSelect = document.getElementById('judet');
    const orasSelect = document.getElementById('oras');

    // Populăm dropdown-ul de județe
    for (const judet in dateRomania) {
        const option = document.createElement('option');
        option.value = judet;
        option.textContent = judet;
        judetSelect.appendChild(option);
    }

    // La schimbarea județului, actualizăm orașele
    judetSelect.addEventListener('change', function () {
        const judetAles = this.value;

        // Golește dropdown-ul de orașe
        orasSelect.innerHTML = '<option value="">-- Selectează un oraș --</option>';

        if (judetAles && dateRomania[judetAles]) {
            dateRomania[judetAles].forEach(oras => {
                const option = document.createElement('option');
                option.value = oras;
                option.textContent = oras;
                orasSelect.appendChild(option);
            });
        }
    });
</script>
<script>
    const items = document.querySelectorAll("#myList li");
    let currentIndex = 0;
    const intervalSeconds = 3;
    let interval;

    function showItem(index) {
        items.forEach((item, i) => {
            item.classList.toggle("active", i === index);
        });
    }

    function nextItem() {
        currentIndex = (currentIndex + 1) % items.length;
        showItem(currentIndex);
    }

    function prevItem() {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showItem(currentIndex);
    }

    document.getElementById("nextBtn").addEventListener("click", () => {
        clearInterval(interval);
        nextItem();
        startInterval();
    });

    document.getElementById("prevBtn").addEventListener("click", () => {
        clearInterval(interval);
        prevItem();
        startInterval();
    });

    function startInterval() {
        interval = setInterval(() => {
            nextItem();
        }, intervalSeconds * 1000);
    }

    // Start automat
    startInterval();
</script>
</body>
<!--</html>-->
