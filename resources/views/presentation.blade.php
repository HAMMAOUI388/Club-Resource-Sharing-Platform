<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" contentt="width=device-width, initial-scale=1.0">
    <title>Industry 4.0</title>
    <link rel="stylesheet" href="{{ asset('css/presentation.css') }}">
</head>
<style>
    /* General Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Grid Styling */
.parent {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 equal columns */
    grid-template-rows: repeat(3, 1fr); /* 3 equal rows */
    gap: 8px;
    width: 1140px; /* Set width to 1140px */
    height: 500px; /* Adjust height for better control */
    margin: 40px auto; /* Center the grid and add margin at top and bottom */
}

/* Grid Item Styling */
.grid-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.grid-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.contentt {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-contentt: center;
    text-align: center;
}

.text {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 16px;
    font-weight: bold;
    color: white;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
}

/* Grid Item Custom Positioning */
.div2 {
    grid-column: 3 / 4;
    grid-row: 2 / 3; /* Adjusted to fit in the grid */
}

.div4 {
    grid-column: 1 / 2;
    grid-row: 1 / 3; /* Adjusted to fit in the grid */
}

.div5 {
    grid-column: 1 / 2;
    grid-row: 3 / 4;
}

.div6 {
    grid-column: 2 / 4;
    grid-row: 1 / 2; /* Adjusted to fit in the grid */
}

.div7 {
    grid-column: 2 / 3;
    grid-row: 2 / 4; /* Adjusted to fit in the grid */
}

.div8 {
    grid-column: 3 / 5;
    grid-row: 3 / 4; /* Adjusted to fit in the grid */
}

.div9 {
    grid-column: 4 / 5;
    grid-row: 1 / 2;
}

.div10 {
    grid-column: 4 / 5;
    grid-row: 2 / 3;
}

/* Margin for the entire section */
.presentation-section {
    margin-top: 50px;
    margin-bottom: 50px;
}


/* General Styles */
.presentation-section {
    margin-top: 40px;
    text-align: center;
}

.contentt-about {
    position: relative;
}

.about-text {
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    margin-bottom: 10px;
}

.see-more-button {
    background-color: transparent;
    color: #fff;
    border: 2px solid #fff;
    padding: 10px 20px;
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    letter-spacing: 2px;
    cursor: pointer;
    transition: 0.3s;
}

.see-more-button:hover {
    background-color: #fff;
    color: #000;
}

</style>
<body>

<!-- Industry 4.0 Grid Section -->
<section class="industry-grid">
    <div class="parent">
        <div class="grid-item div2">
            <div class="contentt">
                <img src="slider/images/industry-club-image.jpg" alt="Image 1">
                <p class="text">Text for Image 1</p>
            </div>
        </div>
        <div class="grid-item div4">
            <div class="contentt">
                <img src="slider/images/1img.jpeg" alt="Image 2">
                <p class="text">Text for Image 2</p>
            </div>
        </div>
        <div class="grid-item div5">
            <div class="contentt">
                <img src="slider/images/2img.jpeg" alt="Image 3">
                <p class="text">Text for Image 3</p>
            </div>
        </div>
        <div class="grid-item div6">
            <div class="contentt">
                <img src="slider/images/3img.jpeg" alt="Image 4">
                <p class="text">Text for Image 4</p>
            </div>
        </div>
        <div class="grid-item div7">
            <div class="contentt">
                <img src="slider/images/4img.jpeg" alt="Image 5">
                <p class="text">Text for Image 5</p>
            </div>
        </div>
        <div class="grid-item div8">
            <div class="contentt">
                <img src="slider/images/industry-club-image.jpg" alt="Image 6">
                <p class="text">Text for Image 6</p>
            </div>
        </div>
        <div class="grid-item div9">
            <div class="contentt">
                <img src="slider/images/industry-club-image.jpg" alt="Image 7">
                <p class="text">Text for Image 7</p>
            </div>
        </div>
        <div class="grid-item div10">
            <div class="contentt">
                <img src="slider/images/industry-club-image.jpg" alt="Image 8">
                <p class="text">Text for Image 8</p>
            </div>
        </div>
    </div>
</section>

<section class="presentation-section">
    <div class="contentt-about">
        <p class="about-text">See more about the club</p>
        <button class="see-more-button">See More</button>
    </div>
</section>



</body>
</html>
