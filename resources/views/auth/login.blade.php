@push('css')
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root {
  --ee-bg:       #FAFAF8;
  --ee-gold:     #B8851F;
  --ee-gold-lt:  #C9962E;
  --ee-text:     #1A1A18;
  --ee-muted:    #3D3B36;
  --ee-border:   rgba(184,133,31,0.2);
  --ee-input-bg: #FFFFFF;
  --ee-input-bd: #E2DFD8;
}

/* Override left panel bg */
.login-left-panel {
  background: var(--ee-bg) !important;
  font-family: 'DM Sans', sans-serif;
  position: relative;
}

/* Back link */
.ee-back {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.7rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--ee-muted) !important;
  text-decoration: none !important;
  transition: color 0.18s;
}
.ee-back:hover { color: var(--ee-gold) !important; }
.ee-back svg { stroke: currentColor; }

/* Heading */
.ee-heading {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  padding-bottom: 1.25rem;
  border-bottom: 1px solid var(--ee-border);
  margin-bottom: 2rem;
}

.ee-title-en {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2.5rem;
  font-weight: 600;
  color: var(--ee-text);
  line-height: 1;
  letter-spacing: -0.01em;
}

.ee-title-ar {
  font-size: 1rem;
  font-weight: 500;
  color: #3D3B36;
  direction: rtl;
  font-family: 'IBM Plex Sans Arabic', sans-serif;
}

/* Override x-form.label */
.login-left-panel label span:first-child {
  font-size: 0.68rem !important;
  letter-spacing: 0.14em !important;
  text-transform: uppercase !important;
  font-weight: 500 !important;
  color: var(--ee-muted) !important;
}

.login-left-panel label span[dir="rtl"] {
  font-size: 0.7rem !important;
  color: #3D3B36 !important;
}

/* Override x-form.input */
.login-left-panel input[type="text"],
.login-left-panel input[type="password"],
.login-left-panel input[type="email"] {
  background: var(--ee-input-bg) !important;
  border-color: var(--ee-input-bd) !important;
  color: var(--ee-text) !important;
  border-radius: 4px !important;
  height: 46px !important;
  font-family: 'DM Sans', sans-serif !important;
  box-shadow: none !important;
  transition: border-color 0.18s, box-shadow 0.18s !important;
}

.login-left-panel input[type="text"]::placeholder,
.login-left-panel input[type="password"]::placeholder {
  color: #8C8A85 !important;
}

.login-left-panel input[type="text"]:focus,
.login-left-panel input[type="password"]:focus {
  border-color: var(--ee-gold) !important;
  box-shadow: 0 0 0 3px rgba(184,133,31,0.1) !important;
  outline: none !important;
}

/* Eye toggle icon */
.login-left-panel .text-gray-500 {
  color: #6B6860 !important;
  transition: color 0.18s;
}
.login-left-panel span[class*="cursor-pointer"]:hover path {
  fill: var(--ee-gold) !important;
}

/* Override x-form.button */
.login-left-panel button[type="submit"] {
  background: var(--ee-gold) !important;
  color: #FFFFFF !important;
  font-family: 'DM Sans', sans-serif !important;
  font-weight: 600 !important;
  font-size: 0.75rem !important;
  letter-spacing: 0.16em !important;
  text-transform: uppercase !important;
  border: none !important;
  border-radius: 4px !important;
  height: 48px !important;
  transition: background 0.18s, box-shadow 0.18s !important;
  flex-direction: column !important;
  gap: 2px !important;
}

.login-left-panel button[type="submit"]:hover {
  background: var(--ee-gold-lt) !important;
  box-shadow: 0 4px 16px rgba(184,133,31,0.2) !important;
}

.login-left-panel button[type="submit"] span[dir="rtl"] {
  font-size: 0.7rem !important;
  font-family: 'IBM Plex Sans Arabic', sans-serif !important;
  letter-spacing: 0 !important;
  font-weight: 400 !important;
  opacity: 0.7 !important;
  line-height: 1 !important;
}
</style>
@endpush

@include('partials.header')

<!-- ===== Page Wrapper Start ===== -->
<div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
    <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">

        <!-- ===== LEFT: Form ===== -->
        <div class="login-left-panel flex flex-col flex-1 w-full lg:w-1/2">
            <div class="w-full max-w-md pt-10 mx-auto relative z-10">
                <a href="{{ route('welcome') }}" class="ee-back">
                    <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 20 20" fill="none">
                        <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Back
                </a>
            </div>

            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto relative z-10 px-4">
                <div>
                    <!-- Heading -->
                    <div class="ee-heading mb-5 sm:mb-8">
                        <span class="ee-title-en">Sign In</span>
                        <span class="ee-title-ar" dir="rtl" lang="ar">تسجيل الدخول</span>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="space-y-5">
                            <!-- Username -->
                            <div>
                                <x-form.label for="username" label="Username" required="true"
                                    label_ar="اسم المستخدم" />
                                <x-form.input name="username" required="true" />
                                <x-form.error name="username" />
                            </div>

                            <!-- Password -->
                            <div>
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
                            <div>
                                <x-form.button text="Click Here to Enter" text_rtl="اضغط هنا للدخول" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ===== RIGHT: Branding (unchanged) ===== -->
        <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
            <div class="flex items-center justify-center z-1">
                <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
                    <img src="{{ asset('Images/shape/grid-01.svg') }}" alt="grid" />
                </div>
                <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
                    <img src="{{ asset('Images/shape/grid-01.svg') }}" alt="grid" />
                </div>
                <div class="flex flex-col items-center max-w-xs">
                    <a href="{{ route('home') }}" class="block mb-4">
                        <img src="{{ asset('Images/logo/EagleEyeLogo.png') }}" class="w-40" alt="Logo" />
                    </a>
                    <p class="mb-2 font-semibold text-white text-title-sm dark:text-white/90 sm:text-title-md flex items-center justify-between">
                        Eagle Eye
                    </p>
                    <p class="text-center text-gray-400 dark:text-white/60">
                        Compliance Solution
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ===== Page Wrapper End ===== -->
@include('partials.footer')
