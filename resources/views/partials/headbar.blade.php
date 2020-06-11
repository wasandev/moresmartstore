<div class="mx-2">
    <div class="w-full mt-4 flex flex-row p-2  border-b ">

        <div class="text-base w-1/2 font-light  text-left text-gray-800 subpixel-antialiased">
            {!! $svg !!}
            <span class="pl-8 py-2">{{ $title }}</span>
        </div>
        <div class="text-sm w-1/2 font-light  text-right  subpixel-antialiased">
            <a class="px-2 py-1 mt-2  text-gray-100 bg-blue-500  hover:bg-blue-700 rounded " href="{{ $link }}">
                {{ $linktext }}
            </a>
        </div>
    </div>
</div>
