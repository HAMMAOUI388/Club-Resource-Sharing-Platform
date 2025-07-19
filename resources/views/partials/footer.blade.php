

<footer class="footerr">
  <div class="footerr-containerr">
    <!-- Column 1: Logo -->
    <div class="footerr-column">
      <a href="{{route('home')}}"><img src="slider/images/logo.png" alt="Industry 4.0 Club Logo" class="footerr-logo"></a>
    </div>

    <!-- Column 2: Contact -->
    <div class="footerr-column">
      <h3>Contact:</h3>
      <ul>
        <li><a href="https://ensabm.usms.ac.ma/" target="_blank">ENSA BM</a></li>
        <li><a href="{{route('home')}}">Club Industry</a></li>
        <li><a href="https://www.instagram.com/industrie__4.0/" target="_blank">Instagram</a></li>
        <li><a href="https://www.linkedin.com/company/club-industrie4-0-ensa-beni-mellal/posts/?feedView=all" target="_blank">LinkedIn</a></li>
      </ul>
    </div>

    <!-- Column 3: About -->
    <div class="footerr-column">
      <h3>About You:</h3>
      <ul>
        <li><a href="{{route('profile.edit')}}">Profile</a></li>
        <li><a href="{{route('logout')}}">Logout</a></li>
      </ul>
    </div>

    <!-- Column 4: Join Us -->
    <div class="footerr-column">
      <h3>Join Us:</h3>
      <ul>
        <li><a href="#">Club</a></li>
        <li><a href="#">Other Options</a></li>
      </ul>
    </div>

    <!-- Column 5: Email Form -->
    <div class="footerr-column">
      <h3>Email Us:</h3>
      <form action="mailto:fatimzahranyx@gmail.com" method="POST" enctype="text/plain">
        <input type="email" name="email" placeholder="Enter your email" required>
        <textarea name="message" placeholder="Your message" required></textarea>
        <button type="submit">Send</button>
      </form>
    </div>
  </div>

<div class="footerr-bottom">
  <p>&copy; 2025 Industry 4.0. All rights reserved.</p>
  <p>Developed by 
    <a href="https://www.linkedin.com/in/fatima-ezzahra-hammaoui-28a316253/" target="_blank" style="color: inherit; text-decoration: underline;">
      HAMMAOUI Fatima Ezzahra
    </a>
  </p>
</div>
</footer>


    <style>


.footerr {
  width: 100%;
  margin-left: calc(-1 * (100vw - 100%) / 2);
  margin-right: calc(-1 * (100vw - 100%) / 2);
  padding-left: calc((100vw - 100%) / 2);
  padding-right: calc((100vw - 100%) / 2);
}
.footerr {
  position: relative;
  width: 100vw;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  padding: 2rem 0;
  background: #000;
  color: white;
  overflow-x: hidden;
}

x-app-layout, section {
  padding: 0 !important;
  margin: 0 !important;
}

/* body, .main-wrapper, .container, .page-wrapper {
  border: 2px dashed red;
}

.footerr {
  border: 3px solid lime;
} */
.footerr-containerr {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 2rem;
  max-width: 100%;
  width: 100%;
  padding: 0 2rem;
  margin: 0 auto;
}



.footerr-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 2rem;
  width: 100%;
  padding: 0 2rem;
}


.footerr-column {
  padding: 1rem;
}

.logo-column {
  display: flex;
  align-items: center;
  justify-content: center;
}

.footerr-logo {
  max-width: 200px;
}

.footerr h3 {
  font-size: 1.2rem;
  margin-bottom: 1rem;
}

.footerr ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footerr ul li {
  margin-bottom: 0.5rem;
}

.footerr a {
  color: #fff;
  text-decoration: none;
}

.footerr a:hover {
  color: #f1683a;
}

.footerr form {
  display: flex;
  flex-direction: column;
}

.footerr input,
.footerr textarea {
  padding: 0.5rem;
  margin-bottom: 0.5rem;
  border-radius: 5px;
  border: none;
  color: #000;
}

.footerr button {
  padding: 0.75rem;
  background-color: #f1683a;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.footerr button:hover {
  background-color: #b74c28;
}

.footerr-bottom {
  margin-top: 2rem;
  text-align: center;
  font-size: 0.875rem;
  color: #bbb;
}

@media (max-width: 768px) {
  .footerr-containerr {
    grid-template-columns: 1fr;
  }

  .footerr-column {
    text-align: center;
  }

  .footerr form {
    width: 100%;
  }

  .footerr-logo {
    margin: 0 auto 1rem auto;
  }
}







    </style>

