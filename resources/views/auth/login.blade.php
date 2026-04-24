@push('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..60,400;12..60,700;12..60,800&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600&family=IBM+Plex+Sans+Arabic:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root {
  --lp-navy:      #0B2447;
  --lp-navy-d:    #091C3E;
  --lp-blue:      #2563EB;
  --lp-blue-h:    #1D4ED8;
  --lp-blue-d:    #1E40AF;
  --lp-teal:      #0EA5E9;
  --lp-text:      #0F172A;
  --lp-muted:     #475569;
  --lp-border:    #E2E8F0;
}

/* ── LEFT PANEL ── */
.ee-left {
  background: var(--lp-navy);
  font-family: 'DM Sans', sans-serif;
  position: relative;
  overflow: hidden;
}

/* subtle blue dot-grid texture */
.ee-left::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32'%3E%3Ccircle cx='16' cy='16' r='1' fill='%232563EB' fill-opacity='0.10'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 0;
}

/* radial blue blob bottom-right */
.ee-left::after {
  content: '';
  position: absolute;
  width: 480px;
  height: 480px;
  bottom: -120px;
  right: -80px;
  background: radial-gradient(circle, rgba(14,165,233,0.07) 0%, transparent 65%);
  pointer-events: none;
  z-index: 0;
}

/* Back link */
.ee-back {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.7rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.45) !important;
  text-decoration: none !important;
  transition: color 0.18s;
}
.ee-back:hover { color: rgba(255,255,255,0.85) !important; }
.ee-back svg { stroke: currentColor; }

/* Form card */
.ee-card {
  position: relative;
  z-index: 10;
  background: #FFFFFF;
  border-radius: 12px;
  max-width: 420px;
  width: 100%;
  margin: 0 auto;
  padding: 2.5rem;
  box-shadow:
    0 2px 8px rgba(9,28,62,0.20),
    0 16px 48px rgba(9,28,62,0.32);
}

/* Corner accents — blue */
.ee-corner {
  position: absolute;
  width: 18px;
  height: 18px;
  pointer-events: none;
}
.ee-corner--tl { top:-1px; left:-1px;   border-top:1.5px solid rgba(37,99,235,0.45); border-left:1.5px solid rgba(37,99,235,0.45); }
.ee-corner--tr { top:-1px; right:-1px;  border-top:1.5px solid rgba(37,99,235,0.45); border-right:1.5px solid rgba(37,99,235,0.45); }
.ee-corner--bl { bottom:-1px; left:-1px;  border-bottom:1.5px solid rgba(37,99,235,0.45); border-left:1.5px solid rgba(37,99,235,0.45); }
.ee-corner--br { bottom:-1px; right:-1px; border-bottom:1.5px solid rgba(37,99,235,0.45); border-right:1.5px solid rgba(37,99,235,0.45); }

/* Heading */
.ee-heading {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  padding-bottom: 1.25rem;
  border-bottom: 1px solid #E2E8F0;
  margin-bottom: 2rem;
}
.ee-title-en {
  font-family: 'Bricolage Grotesque', sans-serif;
  font-size: 2.2rem;
  font-weight: 700;
  color: #0F172A;
  line-height: 1;
  letter-spacing: -0.02em;
}
.ee-title-ar {
  font-size: 1rem;
  font-weight: 500;
  color: #475569;
  direction: rtl;
  font-family: 'IBM Plex Sans Arabic', sans-serif;
}

/* Stagger animations */
@keyframes ee-fade-up {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}
.ee-anim-1 { animation: ee-fade-up 0.5s ease 0.05s both; }
.ee-anim-2 { animation: ee-fade-up 0.5s ease 0.15s both; }
.ee-anim-3 { animation: ee-fade-up 0.5s ease 0.25s both; }
.ee-anim-4 { animation: ee-fade-up 0.5s ease 0.35s both; }

/* Labels */
.ee-card label span:first-child {
  font-size: 0.68rem !important;
  letter-spacing: 0.14em !important;
  text-transform: uppercase !important;
  font-weight: 500 !important;
  color: var(--lp-muted) !important;
}
.ee-card label span[dir="rtl"] {
  font-size: 0.7rem !important;
  color: #64748B !important;
}

/* Inputs */
.ee-card input[type="text"],
.ee-card input[type="password"],
.ee-card input[type="email"] {
  background: #FFFFFF !important;
  border-color: #E2E8F0 !important;
  color: var(--lp-text) !important;
  border-radius: 8px !important;
  height: 48px !important;
  font-family: 'DM Sans', sans-serif !important;
  box-shadow: none !important;
  transition: border-color 0.18s, box-shadow 0.18s !important;
}
.ee-card input[type="text"]::placeholder,
.ee-card input[type="password"]::placeholder { color: #94A3B8 !important; }
.ee-card input[type="text"]:focus,
.ee-card input[type="password"]:focus {
  border-color: var(--lp-blue) !important;
  box-shadow: 0 0 0 3px rgba(37,99,235,0.12) !important;
  outline: none !important;
}
.ee-card input:-webkit-autofill,
.ee-card input:-webkit-autofill:hover,
.ee-card input:-webkit-autofill:focus {
  -webkit-box-shadow: 0 0 0 1000px #FFFFFF inset !important;
  -webkit-text-fill-color: var(--lp-text) !important;
  caret-color: var(--lp-text) !important;
  transition: background-color 5000s ease-in-out 0s !important;
}

/* Eye toggle */
.ee-card .text-gray-500 { color: #94A3B8 !important; transition: color 0.18s; }

/* Button */
.ee-card button {
  background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%) !important;
  color: #FFFFFF !important;
  font-family: 'DM Sans', sans-serif !important;
  font-weight: 600 !important;
  font-size: 0.75rem !important;
  letter-spacing: 0.16em !important;
  text-transform: uppercase !important;
  border: none !important;
  border-radius: 8px !important;
  height: 48px !important;
  transition: background 0.18s, box-shadow 0.18s !important;
  flex-direction: column !important;
  gap: 2px !important;
}
.ee-card button:hover {
  background: linear-gradient(135deg, #1D4ED8 0%, #1E40AF 100%) !important;
  box-shadow: 0 4px 20px rgba(37,99,235,0.35) !important;
}
.ee-card button span[dir="rtl"] {
  font-size: 0.7rem !important;
  font-family: 'IBM Plex Sans Arabic', sans-serif !important;
  letter-spacing: 0 !important;
  font-weight: 400 !important;
  opacity: 0.7 !important;
  line-height: 1 !important;
}

/* ── RIGHT PANEL ── */
.ee-right {
  position: relative;
  overflow: hidden;
  background: var(--lp-navy-d);
}

/* Layered dot + diagonal pattern */
.ee-right::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32'%3E%3Ccircle cx='16' cy='16' r='1' fill='%232563EB' fill-opacity='0.10'/%3E%3C/svg%3E"),
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Cline x1='0' y1='60' x2='60' y2='0' stroke='%232563EB' stroke-width='0.4' stroke-opacity='0.06'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 0;
}

/* Rotating rings — blue */
.ee-ring-outer,
.ee-ring-inner {
  position: absolute;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  transform-origin: center center;
}
.ee-ring-outer {
  width: 460px;
  height: 460px;
  margin-top: -230px;
  margin-left: -230px;
  border: 1px solid transparent;
  border-top-color: rgba(37,99,235,0.50);
  border-right-color: rgba(37,99,235,0.22);
  border-bottom-color: transparent;
  border-left-color: rgba(37,99,235,0.10);
  animation: ee-spin-cw 30s linear infinite;
  z-index: 1;
}
.ee-ring-inner {
  width: 300px;
  height: 300px;
  margin-top: -150px;
  margin-left: -150px;
  border: 1px solid transparent;
  border-top-color: rgba(14,165,233,0.40);
  border-bottom-color: rgba(14,165,233,0.40);
  border-left-color: transparent;
  border-right-color: transparent;
  animation: ee-spin-ccw 22s linear infinite;
  z-index: 1;
}

@keyframes ee-spin-cw  { to { transform: rotate(360deg); } }
@keyframes ee-spin-ccw { to { transform: rotate(-360deg); } }

/* Brand content */
.ee-right-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0;
}

/* Divider — blue */
.ee-divider {
  display: flex;
  align-items: center;
  gap: 12px;
  width: 180px;
  margin: 1.25rem 0 1rem;
}
.ee-divider-line {
  flex: 1;
  height: 1px;
  background: linear-gradient(to right, transparent, rgba(37,99,235,0.55));
}
.ee-divider-line:last-child {
  background: linear-gradient(to left, transparent, rgba(37,99,235,0.55));
}
.ee-divider-diamond {
  width: 7px;
  height: 7px;
  background: var(--lp-blue);
  transform: rotate(45deg);
  flex-shrink: 0;
  opacity: 0.9;
}
</style>
@endpush

@include('partials.header')

<!-- ===== Page Wrapper Start ===== -->
<div class="relative bg-white z-1">
    <div class="relative flex flex-col w-full h-screen lg:flex-row">

        <!-- ===== LEFT: Form ===== -->
        <div class="ee-left flex flex-col flex-1 w-full lg:w-1/2 h-full">
            <div class="w-full max-w-md pt-10 mx-auto relative z-10 px-4">
                <a href="{{ route('welcome') }}" class="ee-back">
                    <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 20 20" fill="none">
                        <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Back
                </a>
            </div>

            <!-- Mobile logo — hidden on lg screens -->
            <div class="lg:hidden flex flex-col items-center pb-2 pt-0 relative z-10">
                <img src="{{ asset('Images/EagleEyeLogoLight.png') }}"
                     alt="Eagle Eye Logo"
                     style="width:160px; filter:drop-shadow(0 0 12px rgba(37,99,235,0.40));" />
                <p style="font-family:'DM Sans',sans-serif; font-size:0.6rem; letter-spacing:0.12em; text-transform:uppercase; color:rgba(255,255,255,0.40); margin-top:0.6rem;">
                    Compliance Intelligence Platform
                </p>
            </div>

            <div class="flex flex-col justify-center flex-1 w-full mx-auto relative z-10 px-4 py-8">
                <div class="ee-card">
                

                    <!-- Heading -->
                    <div class="ee-anim-1">
                        <div class="ee-heading mb-5 sm:mb-8">
                            <span class="ee-title-en">Sign In</span>
                            <span class="ee-title-ar" dir="rtl" lang="ar">تسجيل الدخول</span>
                        </div>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="space-y-5">
                            <!-- Username -->
                            <div class="ee-anim-2">
                                <x-form.label for="username" label="Username" required="true"
                                    label_ar="اسم المستخدم" />
                                <x-form.input name="username" required="true" />
                                <x-form.error name="username" />
                            </div>

                            <!-- Password -->
                            <div class="ee-anim-3">
                                <x-form.label for="password" label="Password" required="true"
                                    label_ar="أدخل كلمة المرور" />
                                <div x-data="{ showPassword: false }" class="relative">
                                    <x-form.input name="password"
                                        x-bind:type="showPassword ? 'text' : 'password'" />
                                    <span @click="showPassword = !showPassword"
                                        class="absolute z-30 text-gray-500 -translate-y-1/2 cursor-pointer right-4 top-1/2 dark:text-gray-400">
                                        <svg x-show="!showPassword" class="fill-current" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z"
                                                fill="#98A2B3" />
                                        </svg>
                                        <svg x-show="showPassword" class="fill-current" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z"
                                                fill="#98A2B3" />
                                        </svg>
                                    </span>
                                    <x-form.error name="password" />
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="ee-anim-4">
                                <x-form.button text="Click Here to Enter" text_rtl="اضغط هنا للدخول" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ===== RIGHT: Branding ===== -->
        <div class="ee-right hidden w-full h-full lg:flex lg:w-1/2 items-center justify-center">
            <div class="ee-ring-outer"></div>
            <div class="ee-ring-inner"></div>

            <div class="ee-right-content">
                <a href="{{ route('home') }}" class="block mb-2">
                    <img src="{{ asset('Images/EagleEyeLogoLight.png') }}"
                         class="w-100 h-auto"
                         alt="Eagle Eye Logo"
                         style="width: 260px; filter: drop-shadow(0 0 18px rgba(37,99,235,0.50));" />
                </a>

                <div class="ee-divider">
                    <div class="ee-divider-line"></div>
                    <div class="ee-divider-diamond"></div>
                    <div class="ee-divider-line"></div>
                </div>

               
                <p style="font-family:'DM Sans',sans-serif; font-size:0.68rem; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.45); margin-bottom:1.25rem;">
                    Compliance Intelligence Platform
                </p>

                <div style="width:40px; height:1px; background:var(--lp-blue); opacity:0.7;"></div>
            </div>
        </div>

    </div>
</div>
<!-- ===== Page Wrapper End ===== -->
@include('partials.footer')
