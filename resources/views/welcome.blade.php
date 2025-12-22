<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaudiCISO.Net - Your Ultimate Strategic Partner</title>
    <link rel="stylesheet" href="css/landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
        }
        /* Embed the CSS for simplicity, or keep the link above for external file */
        /* See the CSS section below for the styles */

        @media (max-width: 768px) {
            .or-text {
                display: none;
            }

            .sub-tagline a.BudgetButton {
                display: block;
                margin: 10px 0;
            }
        }

        .signin-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .signin-container {
            text-align: center;
            max-width: 800px;
            width: 100%;
        }

        .signin-heading {
            font-size: 2em;
            margin-bottom: 20px;
            color: #00053C;
            font-weight: bold;
        }

        .submit-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background-color: #cccccc !important;
        }
    </style>
</head>
<body>

    <div class="landing-page">
        <header class="header">
            <img class="LogoImg" src="Images/SaudiCISOLogo.png" alt="SaudiCISO.Net">
            <!-- <h1 class="logo-text">SaudiCISO.Net</h1> -->
            <p class="tagline">Instantly Empowering Saudi CISO</p>
            {{-- <h2>What is Your Biggest Problem Today?</h2>
            <p class="sub-tagline">We have the Solution. Guaranteed!<br><a href="#" class="action-link">Contact Us!</a></p> --}}

             <h2>What is Your Biggest Problem Today?</h2>
            <p class="sub-tagline">We have the Solution. Guaranteed!<br><br>
                <a href="#" class="BudgetButton" id="headerContactButton">Contact Us!</a>
             </p>

            <img class="ThreePsImg" src="Images/ThreePs5.png" alt="SaudiCISO.net">



        </header>

        <main class="main-content">
            <section class="features-section">
                <div class="feature-item">
                    <div>
                        <img class="iconimage" src="Images/staffimage.png" alt="People">
                    </div>
                    <p class="feature-number">1. PEOPLE</p>
                    <p class="feature-text">Find Top Saudi Talent<br>Access 1200+<br>Certified Staff in KSA</p>
                </div>

                <div class="feature-item">
                    <div>
                        <img class="iconimage" src="Images/security.png" alt="People">
                    </div>
                    <p class="feature-number">2. PRODUCTS:</p>
                    <p class="feature-text">Expert Product Insights<br>Product Categories<br>from A to Z</p>
                </div>

                <div class="feature-item">
                    <div>
                        <img class="iconimage" src="Images/document.png" alt="People">
                    </div>
                    <p class="feature-number">3. PROCESSES:</p>
                    <p class="feature-text">50+ Editable<br>Compliance<br>Documents</p>
                </div>
            </section>
        </main>
        <main class="main-content">
            <section class="features-section">
                <div>
                    <p class="feature-number-down">Vendor-Independent | Executive 12-Month Access | Built for the Saudi Market</p>
                    <p class="feature-number-down">Pre-Developed Editable Templates | Direct Access to hire Saudi Cybersecurity Talent</p>
                    <p class="feature-number-down">Priority WhatsApp Advisory Support | Optional Monthly In-Person Executive Session</p>
                    <p class="feature-text">SaudiCISO.Net is a subscription-based professional platform created exclusively for Chief Information Security Officers (CISOs) in the Kingdom of Saudi Arabia.</p>
                </div>
            </section>
        </main>
        <div class="TwoSec">
            <div>
                <main class="main-content-two">
                    <section>
                        <div>
                            <h2>The Principal Consultant may visit your office to resolve your pressing problem.</h2>
                        </div>
                        <div class="imagesection">
                            <img src="Images/doorknowtwo.png" alt="door-knock">
                        </div>
                    </section>
                </main>
            </div>
            <div>
                <main class="main-content-two">
                    <section>
                        <div>
                            <h2>Everything within your budget until 31 December 2025.</h2>
                        </div>
                        <div class="imagesection">
                            <img src="Images/deadlinetwo.png" alt="deadline">
                        </div>
                    </section>
                </main>
            </div>
        </div>
        <main class="main-content">
            <section class="features-section">
                <div>
                    <p class="feature-number-down"><b>Bonus for CISO:</b> Certified Information Security Manager (CISM) Examination Voucher and Quick Review Session for Purchase Orders and Payments Received by December 31, 2025.</p>
                </div>
            </section>
        </main>
        <main class="main-content">
            <section class="BudgetSec">
                <div class="BudgetCanvas">
                    <div>
                        <p class="BudgetHeading">Budget Issues Solved!</p>
                        <p class="BudgetPara">If you have budget constraints, the full-year subscription is a minimal amount that your main supplier can easily include in their existing project costs.</p>
                        <p class="BudgetButton" id="budgetContactButton">Contact Us!</p>
                    </div>
                </div>
                <div class="BudgetCanvas">
                    <img src="Images/budgettwo.png" alt="budget">
                </div>
            </section>
        </main>

        <main class="main-content">
            <section class="signin-section">
                <div class="signin-container">
                    <h2 class="signin-heading">Portal Access for Paid Members</h2>
                    <a href="/vciso" class="BudgetButton" style="background-color: #00053C; color: white;">Sign In</a>
                </div>
            </section>
        </main>

    </div>
    <div id="contactModal" class="modal">

        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Contact Us to Solve Your Biggest Problem!</h2>
            <form id="contactForm">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Work Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="company">Company/Organization:</label>
                <input type="text" id="company" name="company" required>

                <label for="problem">Your Biggest Problem/Inquiry:</label>
                <textarea id="problem" name="problem" rows="4" required></textarea>

                <button type="submit" class="submit-button">Send Inquiry</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Get the modal element
        var modal = document.getElementById("contactModal");

        // Get the contact elements:
        // 1. The <a> tag in the header with href="#"
        // 2. The <p> tag in the budget section with id="budgetContactButton"
        // 3. The new header contact button with class "BudgetButton"
        var contactTriggers = document.querySelectorAll("a[href='#'], #budgetContactButton, #headerContactButton");

        // Get the <span> element that closes the modal ('&times;')
        var span = document.getElementsByClassName("close-button")[0];

        // Function to open the modal
        function openModal(event) {
            // Check if the event target is an <a> tag and prevent default
            if (event.target.tagName === 'A') {
                event.preventDefault();
            }
            modal.style.display = "block";
        }

        // Attach click events to all contact triggers
        contactTriggers.forEach(function(element) {
            element.onclick = openModal;
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle form submission via AJAX
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Stop the form from submitting normally

            // Get form data
            const formData = new FormData(this);
            const formObject = {};
            for (let [key, value] of formData.entries()) {
                // Map form field names to model field names
                if (key === 'name') formObject.fullname = value;
                else if (key === 'problem') formObject.message = value;
                else formObject[key] = value;
            }

            // Show a loading state or disable submit button
            const submitButton = this.querySelector('.submit-button');
            const originalButtonText = submitButton.textContent;
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;

            // Send the data to the server via an AJAX request
            axios.post('/contact-inquiry', formObject)
                .then(function (response) {
                    // On success, show success message and reset form
                    alert(response.data.message);
                    modal.style.display = "none";
                    document.getElementById('contactForm').reset();
                })
                .catch(function (error) {
                    // On error, show validation errors or generic error message
                    if (error.response && error.response.status === 422) {
                        // Validation error
                        const errors = error.response.data.errors;
                        let errorMessage = "Please correct the following errors:\n";

                        for (let field in errors) {
                            errorMessage += "- " + errors[field][0] + "\n";
                        }

                        alert(errorMessage);
                    } else {
                        // General server error
                        alert('There was an error submitting your inquiry. Please try again.');
                    }
                })
                .finally(function() {
                    // Reset button state regardless of success or error
                    submitButton.textContent = originalButtonText;
                    submitButton.disabled = false;
                });
        });

    </script>

</body>
</html>