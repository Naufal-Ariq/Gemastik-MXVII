<x-layout>
    <x-slot:title>List Tanaman</x-slot>

    <!-- Filters for Plant Habit, Suitable Locations, and Search -->
    <div class="flex justify-between max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div>
            <label for="plantHabit">Plant Habit:</label>
            <select id="plantHabit" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All</option>
                <option value="Herb">Herb</option>
                <option value="Shrub">Shrub</option>
                <option value="Tree">Tree</option>
                <option value="Grass">Grass</option>
                <!-- Add more options based on your data -->
            </select>
        </div>

        <div>
            <label for="suitableLocation">Suitable Locations:</label>
            <select id="suitableLocation" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All</option>
                @foreach ($suitableLocations as $location)
                    <option value="{{ $location }}">{{ $location }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="search">Search:</label>
            <input type="text" id="search" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
    </div>

    <!-- Plant List -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" id="plantList">
            @foreach($postsPage as $post)
                <div class="bg-white overflow-hidden shadow-sm rounded-lg plant-item"
                     data-habit="{{ $post->Plant_Habit }}"
                     data-location="{{ $post->Suitable_Locations }}"
                     data-name="{{ $post->Flowers_Name }}"
                     data-group="{{ $post->Flowers_Group }}"
                     data-containers="{{ $post->Containers }}"
                     data-time="{{ $post->Flowers_Time }}"
                     data-misc="{{ $post->Miscellaneous }}"
                     data-sun="{{ $post->Sun_Requirements }}"
                     data-cold="{{ $post->Minimum_cold_hardiness }}">
                    <a href="/listTanaman/{{$post->Flowers_Name}}">
                        <div class="px-4 py-4">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $post->Flowers_Name }}</h2>
                            @if ($post->photo_base64)
                                <img src="{{ $post->photo_base64 }}" class="mt-2 text-sm text-gray-600" alt="Photo">
                            @else
                                <p class="mx-10 my-10">No image available</p>
                            @endif
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Flowers_Group }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Containers }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Flowers_Time }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Miscellaneous }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Plant_Habit }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Sun_Requirements }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Suitable_Locations }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $post->Minimum_cold_hardiness }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-8">
        {{ $postsPage->links() }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const plantHabitSelect = document.getElementById('plantHabit');
            const suitableLocationSelect = document.getElementById('suitableLocation');
            const searchInput = document.getElementById('search');
            const plantItems = document.querySelectorAll('.plant-item');

            plantHabitSelect.addEventListener('change', filterPlants);
            suitableLocationSelect.addEventListener('change', filterPlants);
            searchInput.addEventListener('input', filterPlants);

            function filterPlants() {
                const selectedHabit = plantHabitSelect.value.toLowerCase();
                const selectedLocation = suitableLocationSelect.value.toLowerCase();
                const searchText = searchInput.value.toLowerCase();

                plantItems.forEach(item => {
                    const habit = item.getAttribute('data-habit').toLowerCase();
                    const location = item.getAttribute('data-location').toLowerCase();
                    const name = item.getAttribute('data-name').toLowerCase();
                    const group = item.getAttribute('data-group').toLowerCase();
                    const containers = item.getAttribute('data-containers').toLowerCase();
                    const time = item.getAttribute('data-time').toLowerCase();
                    const misc = item.getAttribute('data-misc').toLowerCase();
                    const sun = item.getAttribute('data-sun').toLowerCase();
                    const cold = item.getAttribute('data-cold').toLowerCase();

                    const showPlant = (selectedHabit === '' || habit.includes(selectedHabit)) &&
                                      (selectedLocation === '' || location.includes(selectedLocation)) &&
                                      (name.includes(searchText) || group.includes(searchText) ||
                                       containers.includes(searchText) || time.includes(searchText) ||
                                       misc.includes(searchText) || sun.includes(searchText) ||
                                       cold.includes(searchText));

                    item.style.display = showPlant ? 'block' : 'none';
                });
            }
        });
    </script>
</x-layout>
