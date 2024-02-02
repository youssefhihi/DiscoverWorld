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


        {{-- filter adventure --}}
        <form action="{{ route('filterAdventures') }}" method="get" class="mt-4">
            <div class="flex justify-around">
            <div class="flex justify-around ">  
            <label for="sort" class=" p-2 text-lg font-semibold text-gray-700">Sort By:</label>
            <select id="sort" name="sort" class="block ml-3 mt-1 p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                <option disabled selected>Filter by Time</option>
                <option value="oldest">Oldest</option>
                <option value="newest">Newest</option>
            </select>
        </div>
        <div  class="flex justify-around space-x-4 ">
            <label for="country" class=" p-2 text-lg font-semibold text-gray-700 ml-4">Filter By Country:</label>
            <select id="country" name="country" class="block ml-1 p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                <option value="">All Countries</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                @endforeach
            </select>
        </div>
            </div>
            <div class="mx-auto max-w-sm mt-4">
                <button type="submit" class="p-2 w-full border border-blue-800   bg-blue-700 text-white rounded-md hover:bg-white hover:text-blue-700 transition duration-300 ease-in-out">Apply</button>
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


        

    {{-- <div class=" mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Adventure Cards -->
            @foreach ($adventures as $adventure)
            <div class="relative bg-white rounded-md mb-4 ">
                @if($adventure->Country->pictures->picture)
                    <img src="{{ asset($adventure->Country->pictures->picture) }}" alt="Country Picture" class="w-full h-auto cursor-pointer"
                         onclick="openPopup('popup{{ $adventure->id }}')">
                    <div class="absolute md:top-14 top-0 left-0 bottom-10 md:bottom-0 flex items-center justify-center text-white text-3xl font-semibold p-4">
                        {{ $adventure->title }}
                    </div>
                @else
                    <p>No picture available</p>
                @endif
            </div>
        @endforeach
        
        </div> --}}
        

    </div>
    @foreach ($adventures as $adventure)
    <div id="popup{{ $adventure->id }}" class="popup hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-20 ">
        <div class="bg-white m-10 p-5 rounded-md mb-20">
            <div class="flex justify-between mb-4">
                <p class="w-56 mb-2 bg-blue-500 text-white text-center rounded-xl">{{ $adventure->Country->country }}</p>
                <p class="text-gray-700">Published on {{ $adventure->created_at }}</p>
            </div>
            
            <div class="flex space-x-6">
                <div class="max-w-sm">
                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            @foreach ($adventure->pictures as $picture)
                                <img src="{{ asset($picture->picture) }}" alt="Adventure Picture" class="w-full h-auto mb-2">
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <!-- ... (previous button SVG) ... -->
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <!-- ... (next button SVG) ... -->
                        </button>
                    </div>
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
            
            <button class="mt-4 p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 " onclick="closePopup('popup{{ $adventure->id }}')">Close</button>
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
