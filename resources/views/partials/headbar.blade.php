<div class="mx-2">
    <div class="w-full mt-4 flex flex-row p-2 shadow-md rounded items-center bg-white">

        <div class="text-base w-1/2 font-light  text-left text-gray-700 subpixel-antialiased items-center">
            {!! $svg !!}
            <span class="pl-8 py-2">{{ $title }}</span>
        </div>
        <div class="text-sm w-1/2 font-light  text-right  subpixel-antialiased items-center">
            <a class="px-2 py-1 mt-1  rounded-full  text-gray-100 bg-red-500  hover:text-gray-100 hover:bg-blue-500   " href="{{ $link }}" target="{{ $target }}">
                {{ $linktext }}
            </a>
        </div>
    </div>
</div>
