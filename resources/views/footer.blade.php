<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indusry 4.0</title>
    <link rel="stylesheet" href="{{ asset('slider/footer.css') }}">


</head>
<body>

    <footer class="footer">
        <div class="footer-container">
            <!-- Left Section: Club Logo -->
            <div class="footer-left">
                <img src="slider/images/logo.png" alt="Industry 4.0 Club Logo" class="footer-logo">
            </div>

            <!-- Right Section: Contact, About You, Join Us, Email Us (Each in a Column) -->
            <div class="footer-right">
                <div class="footer-columns">
                    <!-- Contact Info Section -->
                    <div class="footer-column">
                        <h3>Contact:</h3>
                        <ul>
                            <li>ENSA BM</li>
                            <li>Club Industry</li>
                            <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                            <li><a href="https://linkedin.com" target="_blank">LinkedIn</a></li>
                        </ul>
                    </div>

                    <!-- About You Section -->
                    <div class="footer-column">
                        <h3>About You:</h3>
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>

                    <!-- Join Us Section -->
                    <div class="footer-column">
                        <h3>Join Us:</h3>
                        <ul>
                            <li><a href="#">Club</a></li>
                            <li><a href="#">Other Options</a></li>
                            <li><a href="#">...</a></li>
                        </ul>
                    </div>

                    <!-- Email Us Section -->
                    <div class="footer-column">
                        <h3>Email Us:</h3>
                        <form action="mailto:your-email@example.com" method="POST" enctype="text/plain">
                            <input type="email" name="email" placeholder="Enter your email" required>
                            <textarea name="message" placeholder="Your message" required></textarea>
                            <button type="submit">Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="footer-bottom">
            <p>&copy; 2025 Industry 4.0. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
