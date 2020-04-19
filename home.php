<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="slidestyles.css">

</head>

<body>
    <?php
    require('header.php');
    include('dbConnect.php');
    ?>

    <!-- Slideshow container -->
    <div class="slideshow">

    <!-- Full-width images with number and caption text -->
    <div class="slide fade">
    <img src="./images/homepage1.png" style="width:100%">
    <div class="captionText">Caption One</div>
    </div>

    <div class="slide fade">
    <img src="./images/homepage2.png" style="width:100%">
    <div class="captionText">Caption Two</div>
    </div>

    <div class="slide fade">
    <img src="./images/homepage3.png" style="width:100%">
    <div class="captionText">Caption Three</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
    <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <script>
        var slideIndex = 1;
        showSlide(slideIndex);

        // Next/previous controls
        function changeSlide(n) {
        showSlide(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlide(slideIndex = n);
        }

        function showSlide(n) {
        var i;
        var slides = document.getElementsByClassName("slide");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" slideActive", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " slideActive";
        }
    </script>
</body>

</html>