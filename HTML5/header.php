<?php global $error_message;
?>
<header>
    <h1>Magazin Motociclete</h1>
    <nav>
        <ul class="menu">
            <li>
                <a href="index.php"><span class="sprite-icon sprite-home"></span>Acasa</a>
            </li>
            <li>
                <a href="inregistrare.php"><span class="sprite-icon sprite-user"></span>Inregistrare</a>
            </li>
            <li>
                <a href="autentificare.php"><span class="sprite-icon sprite-lock"></span>Autentificare</a>
            </li>
            <li>
                <a href="motociclete.php"><span class="sprite-icon sprite-moto"></span>Motociclete</a>
            </li>
        </ul>

    </nav>

    <div style="color: red; font-weight: bold;">
        <?php
        echo $error_message;
        ?>
    </div>

</header>
