<!-- resources/views/statistics.blade.php -->
@include('inc.doctype')
@include('inc.nav')

<section class=" pt-36 ">

    <div class=" max-w-xl mx-auto p-12 text-4xl text-white hover:bg-white hover:text-blue-700 bg-blue-700 rounded-xl border  border-blue-800  h-36 text-center  items-center">
    <h2 class=" my-auto font-mono font-semibold mb-4">Total Adventures: <span >{{ $totalAdventures }}</span> </h2>
    </div>
    <h2 class=" mt-10 text-center mb-10 text-4xl font-semibold font-mono ">Most Posted Countries</h2>
    <div class="  mx-auto max-w-5xl grid grid-cols-1 md:grid-cols-2 md:gap-48">       
        
            @foreach ($mostPostedCountries as $country)
            <div class="flex space-x-10 h-40 bg-gradient-to-r from-blue-100 to-gray-300 rounded-2xl hover:shadow-2xl transform transition-transform hover:scale-105">
            <div>
                    <img src="{{ $country->pictures->picture }}" alt="" class="h-40 w-44 rounded-xl">
                     </div>
                     <div class="flex flex-col gap-6 text-4xl mt-6 ">
                        <p class="font-semibold  ">{{ $country->country }}</p> 
                        <p class="  font-semibold text-blue-700"> {{ $country->adventures_count }} </span> posts</p> 
                     </div> 
            </div>@endforeach
        
    </div>

</section>