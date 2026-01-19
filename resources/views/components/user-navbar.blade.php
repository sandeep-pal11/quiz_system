<nav class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100 px-6 py-4 sticky top-0 z-50">
  <div class="flex justify-between items-center max-w-7xl mx-auto">

    <!-- Logo -->
    <div>
      <a href="/" class="flex items-center gap-2 group">
        <div class="bg-blue-600 text-white p-2 rounded-lg group-hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/30">
             <i class="fa-solid fa-graduation-cap text-xl"></i>
        </div>
        <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Quiz System</span>
      </a>
    </div>

    <!-- Navigation Links -->
    <div class="hidden md:flex items-center space-x-8 text-sm font-semibold">
      <a href="/" class="group flex items-center gap-1 text-gray-600 hover:text-blue-600 transition-all duration-200 uppercase tracking-wider relative overflow-hidden">
          <span>Home</span>
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
      </a>
      <a href="/categories-list" class="group flex items-center gap-1 text-gray-600 hover:text-blue-600 transition-all duration-200 uppercase tracking-wider relative overflow-hidden">
          <span>Categories</span>
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
      </a>
      <a href="/about-us" class="group flex items-center gap-1 text-gray-600 hover:text-blue-600 transition-all duration-200 uppercase tracking-wider relative overflow-hidden">
          <span>About Us</span>
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
      </a>
      <a href="/contact-us" class="group flex items-center gap-1 text-gray-600 hover:text-blue-600 transition-all duration-200 uppercase tracking-wider relative overflow-hidden">
          <span>Contact</span>
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
      </a>

      @if(session('user'))
      
      <div x-data="{ open: false }" class="relative">
          <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2 text-gray-700 font-medium hover:text-blue-600 transition">
              <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                  {{ substr(session('user')->name, 0, 1) }}
              </div>
              <span>{{ session('user')->name }}</span>
              <i class="fa-solid fa-chevron-down text-xs transition-transform" :class="{'rotate-180': open}"></i>
          </button>
          
          <!-- Dropdown -->
          <div x-show="open" 
               x-transition:enter="transition ease-out duration-100"
               x-transition:enter-start="opacity-0 scale-95"
               x-transition:enter-end="opacity-100 scale-100"
               x-transition:leave="transition ease-in duration-75"
               x-transition:leave-start="opacity-100 scale-100"
               x-transition:leave-end="opacity-0 scale-95"
               class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
               
              <a href="/user-details" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                  <i class="fa-solid fa-user mr-2"></i> Profile
              </a>
              <a href="/user-logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                  <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
              </a>
          </div>
      </div>

      @else
      <div class="flex items-center gap-4">
          <a href="/user-login" class="text-gray-600 hover:text-blue-600 font-bold transition">Log In</a>
          <a href="/user-signup" class="bg-blue-600 text-white px-5 py-2.5 rounded-full font-bold shadow-lg shadow-blue-500/30 hover:bg-blue-700 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all duration-200">
              Sign Up
          </a>
      </div>
      @endif
    </div>
    
    <!-- Mobile Menu Button (Simple implementation) -->
    <div class="md:hidden">
        <button class="text-gray-600 hover:text-blue-600">
            <i class="fa-solid fa-bars text-2xl"></i>
        </button>
    </div>
  </div>
</nav>
