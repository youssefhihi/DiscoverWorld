@include('inc.doctype')
@include('inc.nav')
    <div class="mx-auto pt-28 p-20 ">
        <h1 class="text-3xl text-center font-semibold font-italic mb-6">Add New Adventure</h1>

            <form action="{{route('addAdventure')}}" method="POST" class=" mx-auto bg-white p-6 rounded-md w-full" enctype="application/x-www-form-urlencoded">
            @csrf            <!-- Adventure Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full p-2 border-b-2 border-black focus:outline-none focus:border-blue-500">

                </div>


                <!-- Adventure Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="description" name="description"class="w-full p-2 border-b-2 border-black focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <!-- Adventure Advices -->
                <div class="mb-4">
                    <label for="advices" class="block text-gray-700 font-bold mb-2">Advices</label>
                    <textarea id="advices" name="advice" class="w-full p-2 border-b-2 border-black focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <select name="countryID" id="" class="block text-gray-700 font-bold mb-2 w-full p-2 border-b-2 border-black focus:outline-none focus:border-blue-500">
                        <option disabled selected> which country you go</option>
                        @foreach ($countries as $country)
                            <option  value="{{$country->id}}">{{ $country->country}}</option>
                        @endforeach
                    </select>
                </div>  
                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Adventure</button>
                    <a href="#" class="text-gray-500 hover:underline">Cancel</a>
                </div>
            </form>
       
    
    </div>

</body>

</html>
