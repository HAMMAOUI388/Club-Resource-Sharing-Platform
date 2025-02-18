<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indusry 4.0</title>
    <link rel="stylesheet" href="{{ asset('slider/presentation.css') }}">


</head>
<body>


<section class="presentation-section bg-black text-white py-12">
    <div class="container mx-auto flex flex-col lg:flex-row items-center">
        <div class="left-info flex-1 px-6 text-center lg:text-left">
            <h2 class="text-3xl font-semibold mb-4">About Industry 4.0 Club</h2>
            <p class="mb-4">
                The Industry 4.0 Club aims to drive innovation in the field of technology and automation.
                Our members engage in exciting projects related to robotics, AI, IoT, and more. We believe
                in hands-on learning and fostering collaboration between industry professionals and students.
            </p>
            <p class="mb-4">
                Our mission is to explore and push the boundaries of modern industrial technologies while
                creating a strong community of like-minded individuals.
            </p>
            <button class="join-button">JOIN US</button>
        </div>

        <div class="image-container">
            <div class="right-image">
                <img src="{{ asset('slider/images/1img.jpeg') }}" alt="Industry 4.0 Club" class="image">
            </div>
            <div class="overlay-image">
                <img src="slider/images/industry-club-image.jpg" alt="Overlay Image" class="overlay">
            </div>
        </div>
    </div>
</section>
</body>

</html>
