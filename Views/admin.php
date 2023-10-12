<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/projet1/PHP-Oriente-Objet/Views/admin.php">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/projet1/PHP-Oriente-Objet/Views/admin.php">Accueil du site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projet1/PHP-Oriente-Objet/Views/admin.php">Accueil de l'admin</a>
                </li>
            </ul>

            <!-- Moved the </ul> here -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/users/logout">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $servername = "localhost";
            $usernameDB = "root";
            $passwordDB = "";
            $database = "projet";
            
            $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);
            $sql = "SELECT * FROM users";

            $result = $conn->query($sql);
    
     
    
            if ($result->num_rows > 0) {
    
                $users = array();
    
                while ($row = $result->fetch_assoc()) {
    
                    $users[] = $row;
    
                }
                 
            foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['nom'] ?></td>
                    <td><?= $user['prenom'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td>
                        <a href="/projet1/PHP-Oriente-Objet/Views/admin.php" class="btn btn-light" role="button">UPDATE</a>
                        <a href="/projet1/PHP-Oriente-Objet/Views/admin.php" class="btn btn-danger" role="button">DELETE</a>
                    </td>
                </tr>
            <?php endforeach;            }
 ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
</body>

</html>
