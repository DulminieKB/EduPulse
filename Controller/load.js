window.addEventListener("load", function() {

    //get progress bar 
    var progressBar = document.getElementById("progress");
    var progressText = document.getElementById("progress-text");

    //initial progress made to 0%
    var progress = 0;
    
    //interval function defined to increase the progress bar
    var interval = setInterval(function() {

      //increase progress by 1%
      progress += 5;

      //width of progress bar
      progressBar.style.width = progress + "%";

      //progress bar fully loaded and display of percentage
      progressText.textContent ="Loading   " + progress + "%";
      if (progress >= 100) {

        //interval function cleared
        clearInterval(interval);

        //indicate the loading through a message 
        alert("Edu Pulse loading completed!");

        //redirect to the login page
        window.location.href = "../Controller/login.php";
      }
    }, 100);
    
    });
    