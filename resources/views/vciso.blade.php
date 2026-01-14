<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CISO Survival Lifeline</title>
    <link rel="stylesheet" href="{{ asset('css/ciso-lifeline.css') }}">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="nav-left">
                {{-- <a href="/vciso" class="home-link">
                    <i class='bx bx-home'></i>
                </a> --}}
                <a href="{{ route('welcome') }}">
                    <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                        <span class="flex items-center space-x-2">
                            <img src="/Images/SaudiCISOLogo.png" alt="Logo" style="height: 80px; width: auto;">
                        </span>
                    </span>
                </a>
            </div>

            @auth
                <div class="nav-right">
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('users.index') }}" class="admin-portal-btn" title="Admin Portal">
                            <i class='bx bx-cog'></i>
                            <span>Admin Portal</span>
                        </a>
                    @else
                        <a href="{{ route('profile.edit') }}" class="admin-portal-btn" title="Update Profile">
                            <i class='bx bx-cog'></i>
                            <span>Update Profile</span>
                        </a>
                    @endif

                    <form id="logout-form" action="{{ route('login.destroy') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn" title="Logout">
                            <i class='bx bx-log-out'></i>
                            <span>Sign out</span>
                        </button>
                    </form>
                </div>
            @endauth
        </nav>
    </header>

    <main class="main">
        <div class="lifeline-container">
            <!-- Main Title Section -->
            <section class="hero-section">
                <div class="hero-card">
                    <div class="hero-icon">🛡️</div>
                    <h1 class="hero-title">CISO Survival Lifeline</h1>
                </div>
                <!-- Connector lines from hero to branches -->
                <div class="hero-connectors">
                    <div class="connector-line-left"></div>
                    <div class="connector-line-right"></div>
                </div>
            </section>

            <!-- Two Main Branches -->
            <section class="branches-section">
                <div class="branch-container">
                    <a href="{{ route('ciso-toolkit.index') }}" class="branch-card toolkit-card">
                        <div class="branch-icon">🛠️</div>
                        <h2 class="branch-title">CISO Toolkit</h2>
                    </a>

                    <div class="branch-connector">
                        <div class="connector-line"></div>
                        <div class="connector-node"></div>
                    </div>

                    <a href="{{ route('ciso-education.index') }}" class="branch-card education-card">
                        <div class="branch-icon">🎓</div>
                        <h2 class="branch-title">CISO Education</h2>
                    </a>

                    <div class="branch-connector">
                        <div class="connector-line"></div>
                        <div class="connector-node"></div>
                    </div>

                    <a href="{{ route('hot-topics.index') }}" class="branch-card topics-card">
                        <div class="branch-icon">🔥</div>
                        <h2 class="branch-title">Hot Topics for CISO</h2>
                    </a>
                </div>

                <!-- Connector lines from branches to core areas -->
                <div class="branches-to-areas-connectors">
                    <div class="connector-line-center"></div>
                </div>
            </section>

            <!-- Three Core Areas -->
            <section class="core-areas-section">
                <div class="areas-container">
                    <a href="{{ route('people.index') }}" class="area-card people-card">
                        <div class="area-icon">👥</div>
                        <h3 class="area-title">People</h3>
                        {{-- <p class="area-subtitle">Human Resource</p> --}}
                    </a>

                    <a href="{{ route('ciso-process.index') }}" class="area-card process-card">
                        <div class="area-icon">⚙️</div>
                        <h3 class="area-title">Processes</h3>
                        {{-- <p class="area-subtitle">Best Practices</p> --}}
                    </a>

                    <a href="{{ route('ciso-products.index') }}" class="area-card product-card">
                        <div class="area-icon">💻</div>
                        <h3 class="area-title">Products</h3>
                        {{-- <p class="area-subtitle">Technology</p> --}}
                    </a>
                </div>
            </section>
        </div>
    </main>
    <!-- Elfsight AI Chatbot | Saudi Ciso -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div class="elfsight-app-50a59065-4154-49f7-a375-961a269cf1c2" data-elfsight-app-lazy></div>
</body>

</html>
