 <!-- ===== Sidebar Start ===== -->
 <aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
     class="-translate-x-full bg-brand-950 border-gray-200 border-r fixed flex flex-col h-screen left-0 lg:static lg:translate-x-0 overflow-y-hidden px-5 sidebar text-white top-0 w-[290px] z-9999">
     <!-- SIDEBAR HEADER -->
     <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
         class="flex items-center gap-2 pt-8 sidebar-header pb-7">
         <a href="{{ route('compliance') }}">
             <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                 <span class="flex items-center space-x-2">
                     <img class="dark:hidden w-20" src="{{ asset('images/logo/EagleEyeLogo.png') }}" alt="Logo" />
                     <span class="dark:hidden text-2xl font-semibold">Eagle Eye</span>
                 </span>
             </span>
             <img class="logo-icon" :class="sidebarToggle ? 'lg:block mt-10 w-20' : 'hidden'"
                 src="{{ asset('images/logo/EagleEyeLogo.png') }}" alt="Logo" />

         </a>
     </div>
     <!-- SIDEBAR HEADER -->
     <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
         <!-- Sidebar Menu -->
         <nav x-data="{ selected: $persist('Dashboard') }">
             <!-- Menu Group -->
             <div>
                 <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">

                     <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                         class="mx-auto fill-current menu-group-icon" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" clip-rule="evenodd"
                             d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                             fill="" />
                     </svg>
                 </h3>
                 <ul class="flex flex-col gap-4 mb-6">

                     <x-menu-item route_name="organizations.index" label="Organizations" :active="true" />
                     <x-menu-item route_name="locations.index" label="Locations" :active="false" />
                     <x-menu-item route_name="locations.index" label="Departments" :active="false" />
                     <x-menu-item route_name="locations.index" label="Sub-Departments" :active="false" />
                     <x-menu-item route_name="locations.index" label="Classification" :active="false" />
                     <x-menu-item route_name="locations.index" label="Category" :active="false" />
                     <x-menu-item route_name="locations.index" label="Sub-Category" :active="false" />
                     <x-menu-item route_name="locations.index" label="Best Practices" :active="false" />
                     <x-menu-item route_name="locations.index" label="Domains" :active="false" />
                     <x-menu-item route_name="locations.index" label="Sub-Domains" :active="false" />
                     <x-menu-item route_name="locations.index" label="Owners" :active="false" />
                     <x-menu-item route_name="locations.index" label="Owner Roles" :active="false" />
                     <x-menu-item route_name="locations.index" label="Custodians" :active="false" />
                     <x-menu-item route_name="locations.index" label="Custodian Roles" :active="false" />


                     <!-- Menu Item Pages -->
                     {{-- <li>
                         <a href="#" @click.prevent="selected = (selected === 'Pages' ? '':'Pages')"
                             class="menu-item group"
                             :class="(selected === 'Pages') || (page === 'fileManager' || page === 'pricingTables' ||
                                 page === 'blank' || page === 'page404' || page === 'page500' ||
                                 page === 'page503' || page === 'success' || page === 'faq' ||
                                 page === 'comingSoon' || page === 'maintenance') ? 'menu-item-active' :
                             'menu-item-inactive'">
                             <svg :class="(selected === 'Pages') || (page === 'fileManager' || page === 'pricingTables' ||
                                 page === 'blank' || page === 'page404' || page === 'page500' ||
                                 page === 'page503' || page === 'success' || page === 'faq' ||
                                 page === 'comingSoon' || page === 'maintenance') ? 'menu-item-icon-active' :
                             'menu-item-icon-inactive'"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                                     fill="" />
                             </svg>
                             <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                 Pages
                             </span>
                             <svg class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                                 :class="[(selected === 'Pages') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                     sidebarToggle ? 'lg:hidden' : ''
                                 ]"
                                 width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </a>
                         <!-- Dropdown Menu Start -->
                         <div class="overflow-hidden transform translate"
                             :class="(selected === 'Pages') ? 'block' : 'hidden'">
                             <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                 class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                 <li>
                                     <a href="blank.html" class="menu-dropdown-item group"
                                         :class="page === 'blank' ? 'menu-dropdown-item-active' :
                                             'menu-dropdown-item-inactive'">
                                         Blank Page
                                     </a>
                                 </li>
                                 <li>
                                     <a href="404.html" class="menu-dropdown-item group"
                                         :class="page === 'page404' ? 'menu-dropdown-item-active' :
                                             'menu-dropdown-item-inactive'">
                                         404 Error
                                     </a>
                                 </li>
                             </ul>
                         </div>
                         <!-- Dropdown Menu End -->
                     </li> --}}
                     <!-- Menu Item Pages -->
                 </ul>
             </div>

         </nav>
         <!-- Sidebar Menu -->

     </div>
 </aside>
 <!-- ===== Sidebar End ===== -->
