function validateForm() {
  var title = document.getElementById("title").value;
  var releaseYear = document.getElementById("release_year").value;
  var duration_minutes = document.getElementById("duration_minutes").value;
  var rating = document.getElementById("rating").value;

  var errorMessages = [];

  if (title.trim() == "") {
    errorMessages.push("Title is required");
  }

  if (releaseYear < 1800 || releaseYear > new Date().getFullYear()) {
    errorMessages.push("Invalid Release Year");
  }

  if (duration_minutes <= 0) {
    errorMessages.push("Invalid Duration");
  }

  if (rating < 0 || rating > 10) {
    errorMessages.push("Rating should be between 0 and 10");
  }

  if (errorMessages.length > 0) {
    var errorString = "Please fix the following errors:\n";
    errorMessages.forEach(function (message) {
      errorString += "- " + message + "\n";
    });
    alert(errorString);
    return false;
  }

  return true;
}
document
  .getElementById("movieForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit_movie.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          document.getElementById("message").innerHTML = xhr.responseText;
          document.getElementById("movieForm").reset();
        } else {
          alert("Error occurred: " + xhr.status);
        }
      }
    };
    xhr.send(formData);
  });
