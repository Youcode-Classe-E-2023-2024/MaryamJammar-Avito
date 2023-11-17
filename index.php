<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Font Awesome CSS -->
    <title>Liste des Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class=" mt-4 w-full p-6 ">
        <div class="flex justify-around items-center p-4">
            <h3 class="text-dark-600 text-xl font-medium">Liste des Annonces</h3>
            <!-- <div class="mt-4 flex justify-end"> -->
            <a href="create.php" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2 text-center inline-block">
                Ajouter Annonce
            </a>
            <!-- </div> -->
        </div>

        <div class="relative overflow-x-auto ">
            <table class="w-5/6 mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-lg">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">Titre</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Prix</th>
                        <th scope="col" class="px-6 py-3">Date de publication</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3 rounded-tr-lg">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require_once 'connection.php';

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "avito";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("La connexion a échoué : " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM annonces";
                    $result = $conn->query($sql);

                    if ($result === FALSE) {
                        echo "Erreur lors de la récupération des annonces : " . $conn->error;
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row' class='p-2'>" . $row["id"] . "</th>";
                            echo "<td class='p-2'>" . $row["titre"] . "</td>";
                            echo "<td class='p-2'>" . $row["description"] . "</td>";
                            echo "<td class='p-2'>" . $row["prix"] . " Dirhams</td>";
                            echo "<td class='p-2'>" . $row["date_publication"] . "</td>";
                            echo "<td class='p-2'><img src='" . $row["image_url"] . "' alt='Image de l'annonce' class='w-16 h-16'></td>";
                            echo "<td class='p-2 space-x-6'>
                            <a href='edit.php?id=" . $row["id"] . "' class='ml-4 text-blue-500 hover:text-blue-700'>
                                    <i class='fas fa-edit'></i> 
                                </a> 
                                <a href='delete.php?id=" . $row["id"] . "' class='text-red-600 hover:text-red-800' onclick='return confirm(\"Voulez-vous vraiment supprimer cette annonce ?\")'>
                                    <i class='fas fa-trash'></i> 
                                </a>
                                    </td>";
                            echo "</tr>";
                        }

                        $result->free();
                    }

                    $conn->close();
                    ?>

                </tbody>
            </table>
        </div>

    </div>

</body>

</html>