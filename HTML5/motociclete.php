<!--<!DOCTYPE html>-->
<!--<html lang="ro">-->
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motociclete - Magazin Motociclete</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        #popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #popup-content {
            background: white;
            padding: 20px;
            max-width: 90%;
            max-height: 90%;
            overflow: auto;
            position: relative;
            border-radius: 10px;
        }

        #popup-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #333;
        }

        .popup-trigger {
            cursor: pointer;
        }

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
            transition: transform 0.5s ease;
            cursor: pointer;
        }

        header h1:hover {
            transform: scale(1.1) rotate(3deg);
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
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
            position: relative;
        }

        th {
            background-color: #feb47b;
            color: white;
            font-size: 1.2rem;
        }

        th.sorted-asc::after {
            content: " 🔼";
        }

        th.sorted-desc::after {
            content: " 🔽";
        }

        img {
            max-width: 120px;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        img:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        td:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }

        .tooltip {
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(51, 51, 51, 0.9);
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s;
            z-index: 10;
        }

        .tooltip::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -6px;
            border-width: 6px;
            border-style: solid;
            border-color: rgba(51, 51, 51, 0.9) transparent transparent transparent;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
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
<?php
include 'header.php';

?>
<body>

<div id="popup-overlay">
    <div id="popup-content">
        <span id="popup-close">&times;</span>
        <div id="popup-inner"></div>
    </div>
</div>


<main>
    <table>
        <tr>
            <th>Imagine</th>
            <th>Model</th>
            <th>Pret</th>
        </tr>
        <tr>
            <td>
                <img class="popup-trigger" src="CBR500R-culoare-04.png" data-type="image" data-content="CBR500R-culoare-04.png" alt="Honda CBR">
                <div class="tooltip">Honda CBR 500R - Sportiva accesibilă și puternică.Motocicleta sportivă perfectă
                    pentru începători și intermediari.Include ABS și sistem de pornire rapidă.
                </div>
            </td>
            <td>
                Honda CBR 500R
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <img class="popup-trigger"  src="kompletny-uklad-wydechowy-akrapovic-racing-yamaha-mt-07-stal-nierdzewnatytan_1.png"
                     data-type="image" data-content="kompletny-uklad-wydechowy-akrapovic-racing-yamaha-mt-07-stal-nierdzewnatytan_1.png"
                     alt="Yamaha MT-07">
                <div class="tooltip">Yamaha MT-07 - Naked bike agil și ușor de manevrat.Motor bicilindru de 689cc, ideal
                    pentru oraș și touring.Disponibilă și în varianta limitată A2.
                </div>
            </td>
            <td>
                Yamaha MT-07
            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>
                <img class="popup-trigger" src="bmw-select-model-style-rallye-1676369960822.png"
                     data-type="image" data-content="bmw-select-model-style-rallye-1676369960822.png"
                     alt="BMW GS 1250">
                <div class="tooltip">BMW GS 1250 - Cea mai bună motocicletă de aventură.Perfectă pentru drumuri lungi,
                    confort și tehnologie avansată.Include pilot automat și suspensie reglabilă.
                </div>
            </td>
            <td>
                BMW GS 1250
            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>
                <video class="popup-trigger" data-type="video" data-content="https://www.w3schools.com/php/mov_bbb.mp4" poster="iepure.png" muted></video>                <div class="tooltip">Iepure
                </div>
            </td>
            <td>
                iepure
            </td>
            <td>

            </td>
        </tr>
    </table>
    <table class="sortable">
        <thead>
        <tr>
            <th>Nume</th>
            <th>Vârstă</th>
            <th>Oraș</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Maria</td>
            <td>29</td>
            <td>București</td>
        </tr>
        <tr>
            <td>Ion</td>
            <td>35</td>
            <td>Cluj</td>
        </tr>
        <tr>
            <td>Andreea</td>
            <td>24</td>
            <td>Timișoara</td>
        </tr>
        <tr>
            <td>George</td>
            <td>40</td>
            <td>Iași</td>
        </tr>
        </tbody>
    </table>

    <table class="sortable">
        <thead>
        <tr>
            <th>Produs</th>
            <th>Preț</th>
            <th>Cantitate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Laptop</td>
            <td>3500</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>2200</td>
            <td>5</td>
        </tr>
        <tr>
            <td>Monitor</td>
            <td>1200</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Tastatură</td>
            <td>300</td>
            <td>10</td>
        </tr>
        </tbody>
    </table>


    <div id="slider-container">
        <img id="slider-image" src="kompletny-uklad-wydechowy-akrapovic-racing-yamaha-mt-07-stal-nierdzewnatytan_1.png"
             alt="Slide 1"/>
    </div>

    <div class="controls">
        <button id="playPauseBtn">▶️ Play</button>

        <label>
            <input type="checkbox" id="repeatCheckbox"> Repetă
        </label>

        <label for="intervalSelect">Interval (sec):</label>
        <select id="intervalSelect">
            <option value="2">2</option>
            <option value="3" selected>3</option>
            <option value="5">5</option>
            <option value="7">7</option>
        </select>
    </div>

</main>

<footer>
    <p>&copy; 2025 Magazin Motociclete</p>
</footer>
<script>
    $(document).ready(function () {//ia din pagina toate elemd din calsa .popup-trigger
        $(".popup-trigger").on("click", function (e) {
            e.preventDefault();//opreset actiunea sa default

            const type = $(this).data("type");//ia tipu oiectului pe care s a apasat
            const content = $(this).data("content");//ia din src data-content specifi jquery

            let data = "";
            if (type === "image") {
                data = `<img src="${content}" style="max-width:100%; height:auto;">`;
            } else if (type === "video") {
                data = `<video src="${content}" controls style="max-width:100%; height:auto;"></video>`;
            } else if (type === "php") {
                data = $(`#${content}`).php();
            }

            $("#popup-inner").php(data);
            $("#popup-overlay").fadeIn(); //fadein vizibil fadeout invizibil
        });

        $("#popup-close, #popup-overlay").on("click", function (e) {
            if (e.target === this || $(e.target).is("#popup-close")) {
                $("#popup-overlay").fadeOut();
            }
        });
    });

    document.querySelectorAll("table.sortable").forEach((table) => {
        const headers = table.querySelectorAll("thead th");
        headers.forEach((th, columnIndex) => {
            th.addEventListener("click", () => {
                const tbody = table.querySelector("tbody");
                const rows = Array.from(tbody.querySelectorAll("tr"));
                const isNumericColumn = !isNaN(rows[0].children[columnIndex].textContent.trim());
                const isAsc = th.classList.contains("sorted-asc");

                // Reset alte sortări
                headers.forEach(h => h.classList.remove("sorted-asc", "sorted-desc"));

                // Sortează rândurile
                rows.sort((a, b) => {
                    const cellA = a.children[columnIndex].textContent.trim();
                    const cellB = b.children[columnIndex].textContent.trim();

                    if (isNumericColumn) {
                        return isAsc ? cellB - cellA : cellA - cellB;
                    } else {
                        return isAsc
                            ? cellB.localeCompare(cellA)
                            : cellA.localeCompare(cellB);
                    }
                });

                // Adaugă rândurile sortate
                rows.forEach(row => tbody.appendChild(row));

                // Marchează direcția sortării
                th.classList.add(isAsc ? "sorted-desc" : "sorted-asc");
            });
        });
    });
</script>

<script>
    const imageList = [
        "kompletny-uklad-wydechowy-akrapovic-racing-yamaha-mt-07-stal-nierdzewnatytan_1.png",
        "CBR500R-culoare-04.png",
        "bmw-select-model-style-rallye-1676369960822.png"
    ];

    const sliderImage = document.getElementById("slider-image");
    const playPauseBtn = document.getElementById("playPauseBtn");
    const repeatCheckbox = document.getElementById("repeatCheckbox");
    const intervalSelect = document.getElementById("intervalSelect");

    let currentIndex = 0;
    let isPlaying = false;
    let interval = 3000; // default 3 sec
    let timer = null;

    function showNextImage() {
        currentIndex++;
        if (currentIndex >= imageList.length) {
            if (repeatCheckbox.checked) {
                currentIndex = 0;
            } else {
                pauseSlideshow();
                return;
            }
        }
        sliderImage.src = imageList[currentIndex];
    }

    function startSlideshow() {
        interval = parseInt(intervalSelect.value) * 1000;
        isPlaying = true;
        playPauseBtn.textContent = "⏸️ Pauză";
        timer = setInterval(showNextImage, interval);
    }

    function pauseSlideshow() {
        isPlaying = false;
        playPauseBtn.textContent = "▶️ Play";
        clearInterval(timer);
    }

    playPauseBtn.addEventListener("click", () => {
        isPlaying ? pauseSlideshow() : startSlideshow();
    });

    intervalSelect.addEventListener("change", () => {
        if (isPlaying) {
            pauseSlideshow();
            startSlideshow();
        }
    });
</script>

</body>
<!--</html>-->
