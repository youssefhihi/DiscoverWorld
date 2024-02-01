@include('inc.doctype')
@include('inc.nav')
    <div class=" mx-auto p-8">
       
        <h1 class="text-3xl font-bold mb-6">Discover Adventures</h1>
        <a href="{{route('addAdventure')}}">add</a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Adventure Cards -->
            @foreach ($adventures as $adventure)
                <div class="bg-white rounded-md shadow-md p-6 mb-4">
                    <h2 class="text-2xl font-bold mb-2">{{ $adventure->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $adventure->description }}</p>
                    <p class="text-gray-700">Date: {{ $adventure->created_at }}</p>
                    <p class="text-gray-700">Advices: {{ $adventure->advice }}</p>
                    <p class="text-gray-700">Advices: {{ $adventure->Country ? $adventure->Country->country : 'N/A' }}</p>
                   
                  
                </div>
            @endforeach
            <select name="country" id="" class="block text-gray-700 font-bold mb-2 w-full p-2 border-b-2 border-black focus:outline-none focus:border-blue-500">
                <option disabled selected> which country you go</option>
                @foreach ($countries as $country)
                <option value="">{{ $country->country}}</option>
                @endforeach
            </select>
          

      
        </div>

    </div>

</body>
</html>
