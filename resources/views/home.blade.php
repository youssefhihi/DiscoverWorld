@include('inc.doctype')
@include('inc.nav')
    <div class=" mx-auto p-8">
        <a href="{{route('Adventure')}}">add</a>
        <h1 class="text-3xl font-bold mb-6">Discover Adventures</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Adventure Cards -->
            @foreach ($adventures as $adventure)
                <div class="bg-white rounded-md shadow-md p-6 mb-4">
                    <h2 class="text-2xl font-bold mb-2">{{ $adventure->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $adventure->description }}</p>
                    <p class="text-gray-700">Date: {{ $adventure->created_at }}</p>
                    <p class="text-gray-700">Advices: {{ $adventure->advices }}</p>
                </div>
            @endforeach

      
        </div>

    </div>

</body>
</html>
