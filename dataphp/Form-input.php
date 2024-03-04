<?php
error_reporting(0);
require "../config/koneksi.php";
   // $con = mysqli_connect('localhost','root','','db_catalogue_film');

    if(isset($_POST["submit"])){
        $movie_id = $_POST['movie_id'];
        $title = $_POST['title'];
        $director = $_POST['director'];
        $release_year = $_POST['release_year'];
        $genre = $_POST['genre'];
        $duration_minutes = $_POST['duration_minutes'];
        $rating = $_POST['rating'];
        $description = $_POST['description'];

        // echo "INSERT INTO moviecatalog VALUES('$movie_id','$title', '$director', '$release_year', '$genre', '$duration_minutes', '$rating', '$description')";
        $ekstensi_diperbolehkan = array('png','jpg');
        $nama = $_FILES['poster']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['poster']['size'];
        $file_tmp = $_FILES['poster']['tmp_name'];
        move_uploaded_file($file_tmp, '../posters/'.$nama); 
        
                
        $query = "INSERT INTO moviecatalog VALUES('$movie_id','$title', '$director', '$release_year', '$genre', '$duration_minutes', '$rating', '$description','$nama')";
        mysqli_query($conn, $query);
        echo
        "
        <script>alert ('Data Inserted Succesfully')</script>
        ";
        // Jika
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){
        if($query){
            echo 'FILE BERHASIL DI UPLOAD';
            }else{
            echo 'GAGAL MENGUPLOAD GAMBAR';
                }
            }else{
            echo 'UKURAN FILE TERLALU BESAR';
            }
            }else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            }
        }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Movie Catalog</title>
    <link rel="stylesheet" href="Form-input.css">
    <!-- Poppins -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
</head>
<body>
<div class="Formperform">
    <div class="container">
        <h1>Input Movie Catalog</h1>
        <form id="movieForm" action="" method="post" enctype="multipart/form-data">

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            
            <label for="director">Director:</label><br>
            <input type="text" id="director" name="director"><br>
            
            <label for="release_year">Release Year:</label><br>
            <input type="number" id="release_year" name="release_year" min="1900" max="2099" required><br>
            
            <label for="genre">Genre:</label><br>
            <input type="text" id="genre" name="genre"><br>
            
            <label for="duration_minutes">Duration (minutes):</label><br>
            <input type="number" id="duration_minutes" name="duration_minutes" required><br>
            
            <label for="rating">Rating:</label><br>
            <input type="number" id="rating" name="rating" step="0.1" min="0" max="10"><br>
            
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            
            <label for="poster">Poster:</label><br>
            <input type="file" id="poster" name="poster" accept="image/*" required><br>
            
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
    

    <!-- <script src="Form-input.js"></script> -->
</body>
</html>
