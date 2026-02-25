<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <title>UK CISO Resources - Strategic Cybersecurity Intelligence</title>
    <link rel="icon" href="{{ asset('Images/favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/landing.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="fixed top-0 right-0 left-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between md:px-0 px-3 py-3">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 logo-text text-2xl font-bold text-gray-900">
                        <img src="/Images/EuroCISOLogo.png" alt="UK CISO Logo" class="h-16 w-auto" />
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('vciso') }}" class="btn-primary">
                        Access Platform
                    </a>
                    <a href="#" class="BudgetButton btn-secondary" id="headerContactButton">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section pt-32 pb-10 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    @if ($landingPageContent?->hero_title)
                        <h1 class="hero-title mb-6">
                            {!! $landingPageContent->hero_title !!}
                        </h1>
                    @endif
                    <div class="mb-8">
                        @if ($landingPageContent?->hero_list_items)
                            {!! $landingPageContent->hero_list_items !!}
                        @endif
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="flex justify-center lg:justify-end">
                    <div class="hero-image-wrapper w-full max-w-lg">
                        <div class="hero-image">
                            @if ($landingPageContent?->hero_image_path)
                                <img src="{{ asset('storage/' . $landingPageContent->hero_image_path) }}"
                                    alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                            @else
                                <img src="https://images.unsplash.com/photo-1579567761406-4684ee0c75b6?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                            @endif
                        </div>
                        <div class="ripple-ring ripple-1"></div>
                        <div class="ripple-ring ripple-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-14 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="mb-10">
                @if ($landingPageContent?->features_title)
                    <h2 class="section-title mb-12 text-center">
                        {!! $landingPageContent->features_title !!}
                    </h2>
                @endif


                <div class="grid lg:grid-cols-2 gap-12 mt-12 items-center">
                    <!-- Left Column: List Content -->
                    <div>
                        @if ($landingPageContent?->features_list_items)
                            {!! $landingPageContent->features_list_items !!}
                        @endif
                    </div>

                    <!-- Right Column: Professional Image -->
                    <div class="flex justify-center lg:justify-end">
                        <div class="hero-image-wrapper w-full max-w-lg">
                            <div class="hero-image">
                                @if ($landingPageContent?->features_image_path)
                                    <img src="/storage/{{ $landingPageContent->features_image_path }}"
                                        alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1579567761406-4684ee0c75b6?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                                @endif

                            </div>
                            <div class="ripple-ring ripple-1"></div>
                            <div class="ripple-ring ripple-2"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- Program Benefits Section -->
    <section
        class="program-benefits-section py-20 px-6 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                @if ($landingPageContent?->benefits_title)
                    <h2 class="section-title mb-4">
                        {!! $landingPageContent->benefits_title !!}
                    </h2>
                @endif
            </div>

            <!-- Benefits Grid -->
            <div class="grid lg:grid-cols-2 gap-12 items-start max-w-6xl mx-auto">
                <!-- Left Column -->
                <div class="benefit-card">
                    @if ($landingPageContent?->benefits_left_title)
                        <h3 class="benefit-card-title">
                            {!! $landingPageContent->benefits_left_title !!}
                        </h3>
                    @endif

                    @if ($landingPageContent?->benefits_left_items)
                        {!! $landingPageContent->benefits_left_items !!}
                    @endif
                </div>

                <!-- Right Column -->
                <div class="benefit-card">
                    @if ($landingPageContent?->benefits_right_title)
                        <h3 class="benefit-card-title">
                            {!! $landingPageContent->benefits_right_title !!}
                        </h3>
                    @endif
                    @if ($landingPageContent?->benefits_right_items)
                        {!! $landingPageContent->benefits_right_items !!}
                    @endif
                </div>
            </div>
        </div>

        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-30 pointer-events-none">
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-blue-200 rounded-full blur-3xl"></div>
        </div>
    </section>

    <!-- Stats/CTA Section -->
    <section class="stats-section py-24 px-6 relative">
        <div class="max-w-5xl mx-auto text-center relative z-10">
            @if ($landingPageContent?->stats_title)
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    {!! $landingPageContent->stats_title !!}
                </h2>
            @endif
            @if ($landingPageContent?->stats_subtitle)
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    {!! $landingPageContent->stats_subtitle !!}
                </p>
                {{-- </h2> --}}
            @endif

            <div class="flex justify-center gap-6">
                <a href="{{ route('vciso') }}" class="btn-secondary group inline-flex items-center gap-3">
                    <span>Access Platform</span>
                </a>
                <a href="#" class="BudgetButton btn-primary" id="headerContactButton">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 p-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-slate-400 text-sm">
                &copy; 2026 UK CISO. All rights reserved.
            </p>
        </div>
    </footer>
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
    @include('partials.chatbot')
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
                .then(function(response) {
                    // On success, show success message and reset form
                    alert(response.data.message);
                    modal.style.display = "none";
                    document.getElementById('contactForm').reset();
                })
                .catch(function(error) {
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
