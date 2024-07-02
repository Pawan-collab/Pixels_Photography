<?php
include 'connect.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch image names
$sql = "SELECT name FROM image_details";
$result = $conn->query($sql);

$image_names = array(); // Initialize an empty array

if ($result->num_rows > 0) {
    // Fetch data and store in $image_names array
    while($row = $result->fetch_assoc()) {
        $image_names[] = $row["name"];
    }
} else {
    echo "No images found";
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixels Photography </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="pawan">
                <img src="PP-01.png" alt="">
            </div>
            <!-- <div class="logo-wrapper">
                <a class="logo" href="index.html"> <strong>JV</strong> Pixels Photography</a>
            </div> -->

            <ul class="navbar-links">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Experience and Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="#works">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="#Admin">Admin</a></li>

                <!-- <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#works">Works</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
            </ul>
        </div>
    </nav>

    <div class="header">
        <div class="container">
            <div class="box">
                <h4 class="">Hello there !</h4>
                <h1 class="">We are Pixels Photography</h1>
                <!-- <p class="align">
                    At Pixels Photography, our passion for capturing life's most beautiful moments is matched only by our 
                    commitment to excellence. Our team is a vibrant blend of creative professionals, each bringing their unique skills and vision to the table.
                </p> -->
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo"<p>" . htmlspecialchars($row["body"]) . "</p>";
                    }
                } else {
                    echo "";
                }
                ?>
                <!-- <a href="#" class="btn">Gallery</a>
                <a href="#" class="btn">Contact me</a> -->
            </div>

        </div>
    </div>


    <!-- About section -->
    <section class="about bg-light" id="about">
        <div class="container">

            <div class="box">
                <h2 class="title">
                    Pixels Photography, a professional photography company based on Butwal
                </h2>
                <p>
                    I love to pause the wild, happy and real moments of life, just to hear their stories untold.
                    Viverra tristique usto duis vitae diam neque nivamus estan ateuene artines viverra nec setlie no
                    curabit tristique.
                </p>
                <ul>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>Over 5 years of experience</span>
                    </li>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>150+ successfully executed projects</span>

                    </li>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>Exceptional work quality</span>
                    </li>
                </ul>

                <div class="about-bottom">
                    <img src="./images/signature.svg" alt=""
                        class="signature">
                    <div class="about-name-wrapper">
                        <div class="about-name-dark">Pixels Photography</div>
                        <div class="about-rol">Founder of Photography</div>
                    </div>
                </div>
            </div>

            <div class="about-img">
                <div class="img">
                    <img src="./images/pexels-alexis-caso-2944191.jpg" alt="">
                </div>
            </div>

        </div>
    </section>
    <!-- About section -->


    <!-- Services section -->
    <section class="services bg-dark" id="services">
        <div class="heading">
            <h2 class="section-title"><span>My Services</span></h2>
            <p class="section-title2">Quverra tristique justo duis vitae diam neque nivamus aestan ateuene artinaelition
                finibus viverra nec lacus setlie suscipe tristique.</p>
        </div>
        <div class="container">

            <div class="box border-01">
                <div class="item">
                    <img src="./images/icons/icon-1.svg" alt="">
                    <a href="services-page.html">
                        <h6>Photography</h6>
                        <p>Photography bibendum eros amet vacun the vulputate in the vitae miss.</p>
                    </a>
                </div>
            </div>
            <div class="box border-02">
                <div class="item">
                    <img src="./images/icons/icon-2.svg" alt="">
                    <a href="services-page.html">
                        <h6>Videography</h6>
                        <p>Videography bibendum eros amen vacun the vulputate in the vitae miss.</p>
                    </a>
                </div>
            </div>

            <div class="box border-03">
                <div class="item">
                    <img src="./images/icons/icon-3.svg" alt="">

                    <a href="services-page.html">
                        <h6>Photo Retouching</h6>
                        <p>Photo Retouching bibenum eros amen vacun the vulputate the vitae miss.</p>
                    </a>
                </div>
            </div>


            <div class="box border-04">
                <div class="item">
                    <img src="./images/icons/icon-4.svg" alt="">
                    <a href="services-page.html">
                        <h6>Aerial Photography</h6>
                        <p>Aerial Photography bibendum eros amen vacun the vulputate in the miss.</p>
                    </a>
                </div>
            </div>




            <div class="box border-05">
                <div class="item">
                    <img src="./images/icons/icon-5.svg" alt="">
                    <a href="services-page.html">
                        <h6>Lightning Setup</h6>
                        <p>Lightning Setup bibendum eros amen vacus duru in the vitae miss.</p>
                    </a>
                </div>
            </div>
            <div class="box border-06">
                <div class="item">
                    <img src="./images/icons/icon-6.svg" alt="">
                    <a href="services-page.html">
                        <h6>Video Color Grading</h6>
                        <p>Video Color Grading bibendum amen vacus the vulputate in the vitae.</p>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- Services section -->



    <!-- Works Gallery -->
    <section class="gallery bg-dark" id="works">
        <div class="heading">
            <h2 class="title">Gallery</h2>
        </div>
      

        <div class="gallery">
    <?php foreach ($image_names as $image): ?>
        <img src="images/<?php echo $image; ?>" alt="<?php echo $image; ?>">
    <?php endforeach; ?>
</div>

<div class="container">
    <div class="grid-wrapper">
        <div class="image tall">
            <img src="./images/album/pexels-photo-1055613.jpg" alt="">
        </div>
        <div class="image wide">
            <img src="./images/album/pexels-photo-1738986.jpg" alt="">
        </div>
        <div class="image tall">
            <img src="./images/album/pexels-photo-2970287.jpg" alt="">
        </div>
        <div class="image">
            <img src="./images/album/pexels-photo-1722206.jpg" alt="">
        </div>
        <div class="image">
            <img src="./images/album/pexels-photo-3494648.jpg" alt="">
        </div>
    </div>
</div>

    <!--  Works Gallery -->

    <!-- Contact section -->
    <!-- Contact section -->
    <section class="contact bg-light" id="contact">
        <div class="container">
            <div class="box">
                <h2 class="title">
                    Need help with professional photography? Let's work together!
                </h2>
                <ul>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>+977 9816447968</span>
                    </li>
                    <li>
                        <i class="fa fa-at" aria-hidden="true"></i>
                        <span>info@pixelsphotography.com</span>
                    </li>
                    <li>
                        <i class="fa fa-location-pin" aria-hidden="true"></i>
                        <span>XX xxxx St, Butwal, 33700, NEPAL</span>
                    </li>
                </ul>
            </div>

            <div class="box">
                <div class="box-r">
                    <div class="form-box">
                        <div class="form-title">
                            <h2>Get in touch</h2>
                        </div>
                        <form id="contactForm" method="post">
                            <div class="one-line">
                                <div class="box-input">
                                    <i class="far fa-user"></i>
                                    <input type="text" id="fullName" class="text" placeholder="Full Name">
                                    <div class="error" id="Name Error"></div>
                                </div>
                                <div class="box-input">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" id="phone" class="text" placeholder="Your Phone No.">
                                    <div class="error" id="Phone No. Error"></div>
                                </div>
                            </div>

                            <div class="box-input">
                                <i class="fa fa-at"></i>
                                <input type="email" id="email" class="text" placeholder="Email">
                                <div class="error" id="Email Error"></div>
                            </div>
                            <div class="box-input">
                                <label class="address"><i class="fa fa-location-pin"></i></label>
                                <textarea id="address" cols="30" rows="5" placeholder="Your Address"></textarea>
                                <div class="error" id="Address Error"></div>
                            </div>
                            <button type="submit" class="btn-send">Contact us</button>
                            <div class="success" id="Success Message"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section -->

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Clear previous errors and success messages
            document.getElementById('nameError').innerText = '';
            document.getElementById('phoneError').innerText = '';
            document.getElementById('emailError').innerText = '';
            document.getElementById('addressError').innerText = '';
            document.getElementById('successMessage').innerText = '';

            // Get form values
            var fullName = document.getElementById('fullName').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var address = document.getElementById('address').value;

            // Simple validation
            var isValid = true;

            if (fullName.trim() === '') {
                document.getElementById('nameError').innerText = 'Full Name is required';
                isValid = false;
            }

            if (phone.trim() === '') {
                document.getElementById('phoneError').innerText = 'Phone number is required';
                isValid = false;
            }

            if (email.trim() === '') {
                document.getElementById('emailError').innerText = 'Email is required';
                isValid = false;
            } else if (!validateEmail(email)) {
                document.getElementById('emailError').innerText = 'Invalid email format';
                isValid = false;
            }

            if (address.trim() === '') {
                document.getElementById('addressError').innerText = 'Address is required';
                isValid = false;
            }

            if (isValid) {
                document.getElementById('successMessage').innerText = 'Form submitted successfully!';
                        }
        });

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>

    <!-- Contact section -->



    <!-- Footer -->
    <footer class="footer">
        <div class="newsletter">
            <div class="container">
                <div class="box">
                    <h2>Sign up to get latest update</h2>
                    <p>Sign up for our monthly newsletter for the latest news &amp; articles</p>
                </div>
                <div class="form">
                    <form>
                        <input type="email" name="email" placeholder="Enter Email Address" required="">
                        <button>Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <div class="box">
                    <div class="logo-wrapper">
                        <a class="logo" href="index.html">Pixels Photography </a>
                    </div>
                    <div class="text">
                        <p>Together, we strive to turn your moments into timeless memories. Trust Pixels Photography to bring your vision to life.</p>
                            
                    </div>
                </div>
        

                <div class="box">
                    <h3 class="title">Contact</h3>
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>
                                +977 9816447968
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-at"></i>
                            <span>
                                info@pixelsphotography.com
                            </span>
                        </li>
                        <li>
                            <span>
                                XX xxxx St, Butwal, 33700, NEPAL
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class=" copyright">
            <div class="box">
                <p class="">Copyright © 2023 by <a href="#">pixelsphotography</a>. All rights reserved.</p>
            </div>
            <div class="box">
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
            </div>
        </div>
        </div>
    </footer>

</body>

</html>