<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CISO Toolkit</title>
    <link rel="stylesheet" href="{{ asset('css/ciso-lifeline.css') }}">
    
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="nav-left">
                <a href="{{ route('welcome') }}">
                    <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                        <span class="flex items-center space-x-2">
                            <img class="dark:hidden w-10" src="/Images/SaudiCISOLogo.png" alt="Logo" width="100"
                                height="100">
                        </span>
                    </span>
                </a>
            </div>

            @auth
            <div class="nav-right">
                <a href="{{ route('vciso') }}" class="admin-portal-btn" title="Back">
                    <i class='bx bx-arrow-back'></i>
                    <span>Back</span>
                </a>
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
                    <div class="hero-icon">🛠️</div>
                    <h1 class="hero-title">CISO Toolkit</h1>
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
                    
                    {{-- 
                    <div class="branch-connector"> --}}
                    <a href="{{ route('iso-27001.index') }}" class="branch-card smart-search-card">
                        <div class="branch-icon">💻</div>
                        <h2 class="branch-title">ISO 27001</h2>
                    </a>
                    <div class="branch-connector">
                        <div class="connector-line"></div>
                        <div class="connector-node"></div>
                    </div>
                        <a href="{{ route('control-smart-search.index') }}" class="branch-card smart-search-card">
                        <div class="branch-icon">🔍</div>
                        <h2 class="branch-title">Smart Search Controls</h2>
                    </a>
                    <div class="branch-connector">
                        <div class="connector-line"></div>
                        <div class="connector-node"></div>
                    </div>
                    <a href="{{ route('evidences.index') }}" class="branch-card evidence-card">
                        <div class="branch-icon">📋</div>
                        <h2 class="branch-title">Evidence Management</h2>
                    </a>
                    
                </div>


            </section>

            <!-- Three Core Areas (Empty section to maintain layout) -->
            <section class="core-areas-section">
                <div class="areas-container">
                    <!-- Empty to maintain visual structure -->
                </div>
            </section>
        </div>
    </main>

</body>

</html>