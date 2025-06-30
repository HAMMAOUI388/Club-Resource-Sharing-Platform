<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indusry 4.0</title>
<style>
    .footer{
        max-width: 100%;
    background-color: #000;
    color: #fff;
    padding: 2rem 1.5rem;
    text-align: center;
}

.footer-container {
    max-width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}

.footer-left {
    flex: 1;
    padding: 1rem;
}
.footer-leftt {
    flex: 1;
    padding: 1rem;

}

.footer-logoo {
    max-width: 200px;
    display: block;
    margin: 0 auto;
}

.footer-logo {
    max-width: 200px;
    display: block;
    margin: 0 auto;
}

.footer-right {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    flex: 3;
}

.footer-columns {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    width: 90%;
}

.footer-column {
    padding: 1rem;
}

.footer h3 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
}

.footer ul {
    list-style-type: none;
    padding-left: 0;
}

.footer ul li {
    margin: 0.5rem 0;
}

.footer ul li a {
    text-decoration: none;
    color: #fff;
    transition: color 0.3s ease;
}

.footer ul li a:hover {
    color: #f1683a;
}

.footer form {
    display: flex;
    flex-direction: column;
    margin-top: 1rem;
}

.footer input[type="email"], .footer textarea {
    padding: 0.5rem;
    margin: 0.5rem 0;
    border-radius: 5px;
    border: 1px solid #fff;
    color: #000;
}

.footer button {
    padding: 0.75rem;
    background-color: #f1683a;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.footer button:hover {
    background-color: #0056b3;
}

.footer-bottom {
    margin-top: 2rem;
    font-size: 0.875rem;
    color: #bbb;
}

@media (max-width: 768px) {
    .footer-columns {
        grid-template-columns: 1fr;
    }

    .footer-right {
        flex-direction: column;
        align-items: center;
    }
}

</style>

</head>
<body>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <img src="slider/images/logo.png" alt="Industry 4.0 Club Logo" class="footer-logo">
            </div>

            <div class="footer-right">
                <div class="footer-columns">
                    <div class="footer-column">
                        <h3>Contact:</h3>
                        <ul>
                            <li>ENSA BM</li>
                            <li>Club Industry</li>
                            <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                            <li><a href="https://linkedin.com" target="_blank">LinkedIn</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h3>About You:</h3>
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h3>Join Us:</h3>
                        <ul>
                            <li><a href="#">Club</a></li>
                            <li><a href="#">Other Options</a></li>
                            <li><a href="#">...</a></li>
                        </ul>
                    </div>

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

        <div class="footer-bottom">
            <p>&copy; 2025 Industry 4.0. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
