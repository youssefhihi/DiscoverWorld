@include('inc.doctype')
@include('inc.nav')
<section class="h-screen flex flex-col justify-center items-center">
    <div class="flex items-center mb-6">
        <i class="fa-solid fa-plane-departure mr-7 text-4xl text-blue-900"></i>
        <h1 class="font-bold text-6xl font-mono ">Discover Adventures</h1>
    </div>
    
    <a href="{{ route('addAdventure') }}" class="flex items-center p-3 bg-blue-700 border border-blue-700 rounded-xl text-white hover:bg-white hover:text-blue-700 transition duration-300 ease-in-out">
        <i class="fa-solid fa-paper-plane me-2 mr-3"></i>
        Add Your Adventure
        
    </a>
</section>


       {{-- Filter adventure --}}
<form action="{{ route('filterAdventures') }}" method="get" class="mt-4">
    
    <div class="flex flex-col justify-between max-w-3xl mx-auto  md:flex-row items-center  space-y-4 md:space-y-0 md:space-x-4">
        <!-- Sort By -->
        <div class="flex items-center">
            <label for="sort" class="md:text-lg font-semibold text-gray-700 pr-2">Sort By:</label>
            <select id="sort" name="sort" class="p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                <option disabled selected>Filter by Time</option>
                <option value="oldest">Oldest</option>
                <option value="newest">Newest</option>
            </select>
        </div>

        <!-- Filter By Country -->
        <div class="flex items-center">
            <label for="country" class="text-lg font-semibold text-gray-700 pr-2">Filter By Country:</label>
            <select id="country" name="country" class="p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                <option value="">All Countries</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Apply Button -->
    <div class="mx-auto max-w-sm mt-4">
        <button type="submit" class="p-2 w-full border border-blue-800 bg-blue-700 text-white rounded-md hover:bg-white hover:text-blue-700 transition duration-300 ease-in-out">
            Apply
        </button>
    </div>
</form>

            
   
 <div class=" mt-5 flex flex-wrap justify-center  gap-16 mx-auto">
        
<!-- Adventure Cards -->
@foreach ($adventures as $adventure)
<div   onclick="openPopup('popup{{ $adventure->id }}')" class=" cursor-pointer max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"> 
        <img class="rounded-t-lg relative" src="{{ asset($adventure->Country->pictures->picture) }}" alt="" />
    <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ $adventure->title }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($adventure->description, 120) }}</p>
       
    </div>
</div>
@endforeach
        
</div>



        

    </div>
    @foreach ($adventures as $adventure)
    <div id="popup{{ $adventure->id }}" class="popup hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-20">
        <div class="bg-white m-10 p-5 rounded-md mb-20">
            <div class="flex flex-col md:flex-row md:justify-between mb-4">
                <p class="w-full md:w-56 mb-2 bg-blue-500 text-white text-center rounded-xl md:mb-0">{{ $adventure->Country->country }}</p>
                <p class="text-gray-700 mt-2 md:mt-0">Published on {{ $adventure->created_at }}</p>
            </div>
            
            <div class="flex flex-col md:flex-row md:space-x-6">
               
                    
                        <div class="  md:max-w-sm rounded-lg max-w-4xl flex flex-wrap">
                            @foreach ($adventure->pictures as $picture)
                                <img src="{{ url('/storage/'. $picture->picture) }}" alt="Adventure Picture" class=" w-36  h-auto mb-2">
                            @endforeach
                        </div>
                    
                    

                
                <div class="flex flex-col gap-3">
                    <h2 class="text-4xl font-bold text-blue-800 hover:underline">{{ $adventure->title }}</h2>
                    
                    <div class="flex flex-col">
                        <p class="font-bold text-xl">Description:</p>
                        <p class="text-gray-600 mb-4">{{ $adventure->description }}</p>
                    </div>
                    
                    <div class="flex flex-col">
                        <p class="font-bold text-xl">Advices:</p>
                        <p class="text-gray-700">{{ $adventure->advice }}</p>
                    </div>
                </div>
            </div>
            
            <button class="mt-4 p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" onclick="closePopup('popup{{ $adventure->id }}')">Close</button>
        </div>
    </div>
@endforeach


</body>
<script>
    function openPopup(popupId) {
        document.getElementById(popupId).classList.remove('hidden');
    }

    function closePopup(popupId) {
        document.getElementById(popupId).classList.add('hidden');
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>
