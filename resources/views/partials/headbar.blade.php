<div class=" mx-2 bg-gray-200 rounded-md">
    <div class="w-full mt-4 flex flex-row p-2 items-center">

        <div class="text-base w-1/2 font-semibold  text-left text-gray-700 subpixel-antialiased items-center">
            {!! $svg !!}
            <span class="pl-8 py-2">{{ $title }}</span>
        </div>
        <div class="text-sm w-1/2 font-light  text-right  subpixel-antialiased items-center">
            <a class="px-2 py-1 mt-1  rounded  text-gray-100 bg-blue-500  hover:text-gray-100 hover:bg-gray-600   " href="{{ $link }}" target="{{ $target }}">
                {{ $linktext }}
            </a>
        </div>
    </div>
</div>
