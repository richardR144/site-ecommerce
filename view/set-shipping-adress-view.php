<?php
declare(strict_types=1);
require_once("../config/config.php");
require_once("../view/partial/_header.php"); ?>


    <body>
    <main>
        <form method="POST">
            <label for="shippingAdress">Votre adresse de livraison</label>
            <input type="text" name="shippingAdress" placeholder="Votre adresse de livraison" id="shippingAdress"/>
            <button type="submit">Valider votre adresse</button>
        </form>

        <!--    je vérifie que la requete se fait bien -->
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>

            <p> <?php echo $message ?> </p>

        <?php } ?>

    </main>
    </body>

<?php
require_once("../view/partial/_footer.php");