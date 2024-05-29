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
    <style>
        /* Hide the default file input */
        #poster {
        display: none;
        }
        /* Style the label element to look like a button */
        .file-label {
        margin-top: 10px;
        background-color: #028391;
        color: #fff;
        border-radius: 10px;
        padding: 10px 20px;
        cursor: pointer;
        display: inline-block;
        }
        /* Style for the file name display */
        .file-name {
        margin-left: 10px;
        margin-top: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: #000;
        }
        /* Ensure the input file is positioned correctly */
        .file-input-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container position-absolute top-50 start-50 translate-middle" style=" border-radius: 10px; padding: 15px; width: 40vw">
        <p class="display-6 title text-center fst-italic mt-3" style="font-family: 'Times New Roman', Times, serif; margin: 0; padding-right: 60px">Display Data  </p>
        <h1 class="display-6 title text-center fst-italic " style="font-family: 'Times New Roman', Times, serif; padding-left: 60px" > Filmophoria </h1>        
        <form id="movieForm" action="" method="post" enctype="multipart/form-data">

            <label for="movie_id">No :</label><br>
            <input type="number" id="movie_id" name="movie_id" required><br>

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            
            <label for="director">Director:</label><br>
            <input type="text" id="director" name="director"><br>
            
            <label for="release_year">Release Year:</label><br>
            <input type="number" id="release_year" name="release_year" min="1900" max="2025" required><br>
            
            <label for="genre">Genre:</label><br>
            <input type="text" id="genre" name="genre"><br>
            
            <label for="duration_minutes">Duration (minutes):</label><br>
            <input type="number" id="duration_minutes" name="duration_minutes" required><br>
            
            <label for="rating">Rating:</label><br>
            <input type="number" id="rating" name="rating" step="0.1" min="0" max="10"><br>
            
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            
            <div class="file-input-wrapper">
                <label for="poster" class="file-label">Choose File</label>
                <span id="file-name" class="file-name">No file chosen</span>
            </div>
            <input type="file" id="poster" name="poster" accept="image/*" ><br>
            
            <button style="background-color: #028391; border-radius: 6px; font-weight: bold;" type="submit" name="submit">Submit</button>
        </form>
        <a style="color: #028391; text-decoration: none;" href="../display/display-data.php" target="_blank"><p class="title text-center mt-3" style=" font-family: 'poppins', sans-serif; margin: 0;">Lihat Data</p></a>

   </div>
   <script>
       // JavaScript to display the selected file name
       const fileInput = document.getElementById('poster');
       const fileName = document.getElementById('file-name');

       fileInput.addEventListener('change', function() {
           if (this.files && this.files.length > 0) {
               fileName.textContent = this.files[0].name;
           } else {
               fileName.textContent = 'No file chosen';
           }
       });
   </script>
</body>
</html>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Movie Catalog</title>
    <link rel="stylesheet" href="Form-input.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
   <div class="container-xl position-absolute top-50 start-50 translate-middle" style="border: 5px solid #D9D9D9D9; border-radius: 20px; padding: 30px">
        <form id="movieForm" action="" method="post" enctype="multipart/form-data">

            <label for="movie_id">No :</label><br>
            <input type="number" id="movie_id" name="movie_id" required><br>

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
            <input style="background-color: #028391;  border-radius: 16px; color: #ffff; " type="file" id="poster" name="poster" accept="image/*" required><br>
            
            <button style="margin-top: 20px; background-color: #028391; border-radius: 16px" type="submit" name="submit">Submit</button>
        </form>
   </div>
</body>
</html> -->
