<?php
error_reporting(0);
require_once("../config/db.php");
$query = "SELECT * FROM moviecatalog";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="displaydata.css">
    <title>Filmophoria x Big Buns</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #F5F5F5F5;">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <p class="display-6 title text-center fst-italic mt-3" style="font-size: 10; font-family: 'Times New Roman', Times, serif; margin: 0; padding-right: 120px">Display Data  </p>
                        <h1 class="display-6 title text-center fst-italic " style="font-family: 'Times New Roman', Times, serif; padding-left: 120px" > Filmophoria </h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td style="background-color: #D9D9D9; color:white;">Movie ID</td>
                                <td style="background-color: #D9D9D9; color:white;">Title Film</td>
                                <td style="background-color: #D9D9D9; color:white;">Director</td>
                                <td style="background-color: #D9D9D9; color:white;">Release Year</td>
                                <td style="background-color: #D9D9D9; color:white;">Genre</td>
                                <td style="background-color: #D9D9D9; color:white;">Durations</td>
                                <td style="background-color: #D9D9D9; color:white;">Rating</td>
                                <td style="background-color: #D9D9D9; color:white;">Description </td>
                                <td style="background-color: #D9D9D9; color:white;">Poster</td>
                                <td style="background-color: #D9D9D9; color:white;"></td>
                            </tr>
                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                    <td><?php echo $row['movie_id'] ?></td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['director'] ?></td>
                                    <td><?php echo $row['release_year'] ?></td>
                                    <td><?php echo $row['genre'] ?></td>
                                    <td><?php echo $row['duration_minutes'] ?></td>
                                    <td><?php echo $row['rating'] ?></td>
                                    <td class="text-start"><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['poster']?></td>
                                    <td>
                                        <a href="?aksi=edit&id=<?php echo $row['movie_id'] ?>" style="width: 58px; margin-bottom:2px;" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="?aksi=hapus&id=<?php echo $row['movie_id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        <?php
                                        if ($_GET['aksi'] == 'hapus') {
                                            $id = $_GET['id'];
                                            mysqli_query($con, "DELETE FROM moviecatalog WHERE movie_id ='$id'");
                                            header('location:display-data.php');
                                        }
                                        ?>
                                    </td>
                            </tr>

                        <?php
                                }

                        ?>

                        </table>
                        <a href="../dataphp/Form-input.php">Insert Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>