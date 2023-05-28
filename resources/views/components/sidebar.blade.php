<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <h3 class="text-xl font-semibold mb-3">All Category</h3>

        @foreach ($categories as $category)
        <a href="#" class="text-semibold block py-2 px-3 rounded">{{ $category->title . "($category->posts_count)"
            }}</a>
        @endforeach
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">{{ App\Models\FrontendDetails::getTitle('about')?->title }}</p>
        <p class="pb-2">{{ App\Models\FrontendDetails::getTitle('about')?->content }}</p>
        <a href="#"
            class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>

</aside>