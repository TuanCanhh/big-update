<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" type="text/css" href="./css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <section class="contact">
        <div class="container">

            <h2>Contact Us</h2>
            <div class="contact-wrapper">
                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form id="contactForm" onsubmit="return validateForm()">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name" required>
                            <span class="error-message" id="nameError"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Your Email" required>
                            <span class="error-message" id="emailError"></span>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                            <span class="error-message" id="messageError"></span>
                        </div>
                        <button onclick="arlt()" type="submit">Send Message</button>
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><i class="fas fa-phone"></i>091234567890</p>
                    <p><i class="fas fa-envelope"></i>123@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>Trịnh Văn Bô<br> Nam Từ Liêm, Hà Nội</p>
                </div>
            </div>
        </div>
    </section>

    <script src="js/contact.js"></script>
</body>

</html>
