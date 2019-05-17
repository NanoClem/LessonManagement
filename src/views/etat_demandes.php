<!DOCTYPE html>
<html>

    <head>
        <!-- <link rel="stylesheet" type="css" href="/../../bootstrap/css/bootstrap.min.css"/> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <?php include "templates/navigation.php"; ?>

    <body>

        <!-- TABLEAU DES DEMANDES EFFECTUEES -->
        <table class="table table-hover">

            <thead>
                <tr>
                    <th scope="col">Etat</th>
                    <th scope="col">Objet de la demande</th>
                </tr>
            </thead>

            <tbody>
                <!-- INCLUDE FICHIER PHP -->
                <?php require("../php/get_demandes.php") ?>

                <!-- <tr>
                <td>Mark</td>
                <td>Otto</td>
                </tr>

                <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                </tr> -->

            </tbody>

        </table>

    </body>

    <?php include "templates/footer.html"; ?>
</html>