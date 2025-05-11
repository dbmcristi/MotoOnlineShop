<!--<!DOCTYPE html>-->
<!--<html lang="ro">-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrare Motociclete</title>
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
    </style>
</head>
<body>

<?php
include 'header.php';
?>

<main>
    <section>
        <table>
            <tr>
                <td colspan="2" class="header"><strong>Adaugare Motocicleta</strong></td>
            </tr>
            <tr>
                <td>
                    <form action="apiProcesss.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Detalii Motocicleta</legend>
                            <p>Model: <input type="text" id="model" name="model" maxlength="50" required></p>
                            <p>Pret: <input type="number" id="price" name="price" min="1" required> Lei</p>
                            <p>Imagine: <input type="file" id="image" name="image" accept="image/*"></p>
                            <input type="hidden" id="userId" name="userId" value="<?php echo $current_userId; ?>">

                            <p><input type="submit" value="Adauga Motocicleta"></p>
                        </fieldset>
                    </form>
                </td>
            </tr>
        </table>
    </section>

    <section>
        <table>
            <thead>
            <tr>
                <td colspan="3" class="header"><strong>Lista Motociclete Get by vendor</strong></td>

            </tr>
            <tr>
                <th>Marca</th>
                <th>Model</th>
                <th>Actiuni</th>
            </tr>

                    <input type="hidden" id="myUserId" name="myUserId" value="<?php echo $current_userId; ?>">

            </thead>
            <tbody>
            <tr>
                <td colspan="3">Se incarca...</td>
            </tr>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <p>&copy; 2025 Magazin Motociclete</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const myUserId = document.getElementById('myUserId').value;
        console.log("myUserId is:", myUserId);  // <-- Add this

        fetch(`apiProcess.php?userId=${myUserId}`)
            .then(response => response.json())
            .then(products => {
                alert(products);
                const table = document.querySelector("table tbody");
                table.innerHTML = ""; // Clear existing rows

                if (products.length === 0) {
                    table.innerHTML = `<tr><td colspan="3">Nu exista produse pentru acest vendor.</td></tr>`;
                    return;
                }

                products.forEach(product => {
                    const row = document.createElement("tr");

                    row.innerHTML = `
                    <td>${product.model}</td>
                    <td>${product.price} Lei</td>
                    <td>
                        <a href="editare.php?id=${product.id}">Editeaza</a> |
                        <a href="stergere.php?id=${product.id}">Sterge</a>
                    </td>
                `;
                    table.appendChild(row);
                });
            })
            .catch(error => {
                console.error("Eroare la preluarea datelor:", error);
            });
    });
</script>
</body>
<!--</html>-->

