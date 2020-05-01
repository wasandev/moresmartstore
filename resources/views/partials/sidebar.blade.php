 {{-- //right-side --}}
 <div class="hidden  xl:text-sm xl:block xl:w-1/4 h-full">
    <div class="flex flex-col justify-between overflow-y-auto sticky top-0  p-2">
        @for ($i = 0; $i < 5; $i++)
            <div class="bg-gray-200 w-full mx-auto p-4 m-2  rounded-lg h-32">
                <h1 class="text-xl font-semibold">ads {{ $i }}</h1>
                <p class="text-lg font-base">The current value is {{ $i }}</p>
                <p class="text-sm font-thin">The current value is {{ $i }}</p>
            </div>
        @endfor
    </div>
</div>
