<x-layout>
<x-slot:title>{{ $post->Flowers_Name }}</x-slot:title>

<div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-6 lg:max-w-7xl lg:px-8">
            <div class="flex xl:gap-x-8">
                <div class="w-5/12 overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                @if ($post->photo_base64)
                    <img class="w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 " src="{{ $post->photo_base64 }}" alt="Plant Photo">
                @else
                    <p>No image available</p>
                @endif
                </div>
                <div class="mt-4 ml-5 flex flex-1">
                    <div>
                        <h1 class="mt-2 text-sm font-bold">Flowers Group</h1>
                        <p class="mt-2 text-base">{{ $post->Flowers_Group ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Containers</h1>
                        <p class="mt-2 text-base">{{ $post->Containers ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Flowers Time</h1>
                        <p class="mt-2 text-base">{{ $post->Flowers_Time ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Miscellaneous</h1>
                        <p class="mt-2 text-base">{{ $post->Miscellaneous ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Plant Habit</h1>
                        <p class="mt-2 text-base">{{ $post->Plant_Habit ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Sun Requirements</h1>
                        <p class="mt-2 text-base">{{ $post->Sun_Requirements ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Suitable Locations</h1>
                        <p class="mt-2 text-base">{{ $post->Suitable_Locations ?: '-' }}</p>
                        <h1 class="mt-2 text-sm font-bold">Minimum Cold Hardiness</h1>
                        <p class="mt-2 text-base">{{ $post->Minimum_cold_hardiness ?: '-' }}</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('listTanaman') }}" class="font-medium text-blue-500 hover:underline">&laquo; Back</a>
        </div>
    </div>
</x-layout>