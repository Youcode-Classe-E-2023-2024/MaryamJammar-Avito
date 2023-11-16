<!-- annonces.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Annonces</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="ml-96 mt-48 w-3/6 p-6">
        <div class="flex justify-evenly">
            <h3 class="text-dark-600 text-xl font-medium">Liste des Annonces</h3>
        </div>

        <?php
        require_once 'connection.php';

        // Exemple d'utilisation de MySQLi (assurez-vous de remplacer les informations de connexion)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "avito";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // Requête SQL pour sélectionner toutes les annonces
        $sql = "SELECT * FROM annonces";
        $result = $conn->query($sql);

        // Vérifier si la requête a réussi
        if ($result === FALSE) {
            echo "Erreur lors de la récupération des annonces : " . $conn->error;
        } else {
            // Afficher les annonces dans un tableau HTML
            echo "<table class='w-full border-collapse border border-gray-300 mt-4'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th class='p-2 border border-gray-300'>Titre</th>";
            echo "<th class='p-2 border border-gray-300'>Description</th>";
            echo "<th class='p-2 border border-gray-300'>Prix</th>";
            echo "<th class='p-2 border border-gray-300'>Date de publication</th>";
            echo "<th class='p-2 border border-gray-300'>Image</th>";
            echo "<th class='p-2 border border-gray-300'>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Afficher les annonces
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='p-2 border border-gray-300'>" . $row["titre"] . "</td>";
                echo "<td class='p-2 border border-gray-300'>" . $row["description"] . "</td>";
                echo "<td class='p-2 border border-gray-300'>" . $row["prix"] . " Dirhams</td>";
                echo "<td class='p-2 border border-gray-300'>" . $row["date_publication"] . "</td>";
                echo "<td class='p-2 border border-gray-300'><img src='" . $row["image_url"] . "' alt='Image de l'annonce' class='w-16 h-16'></td>";
                echo "<td class='p-2 border border-gray-300'>
                        <a href='edit.php?id=" . $row["id"] . "'>Modifier</a> |
                        <a href='delete.php?id=" . $row["id"] . "'>Supprimer</a>
                    </td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";

            // Libérer le résultat
            $result->free();
        }

        // Fermer la connexion
        $conn->close();
        ?>

    </div>

</body>
</html>
