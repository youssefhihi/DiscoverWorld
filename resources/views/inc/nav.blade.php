<body class="bg-gray-100">


    
<nav class=" bg-black opacity-75 p-4 fixed w-full z-10">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo or Brand -->
        <a href="#" class="text-white text-2xl font-bold">
            <img src="{{ asset('/img/logo.png') }}" alt="Logo" class="w-14">
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-4">
            <a href="{{route("filterAdventures")}}" class="p-3 text-white hover:underline">Home</a>
            <a href="{{route("explore")}}" class="p-3 text-white hover:underline">Explore</a>
          
           
        </div>

        <!-- Mobile Navigation (Hidden on larger screens) -->
        <div class="md:hidden">
            <!-- Hamburger Icon -->
            <button id="mobile-menu-btn" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden absolute top-16 right-4 bg-black p-4 space-y-2">
                <a href="#" class="text-white hover:underline block">Home</a>
                <a href="#" class="text-white hover:underline block">Adventures</a>
                <a href="{{ route('addAdventure') }}" class="text-white hover:underline block">Add Your Adventure</a>
            </div>
        </div>
    </div>
</nav>


