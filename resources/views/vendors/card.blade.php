<div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
    @foreach ($vendors as $vendor)
        <div class="w-full flex flex-col md:w-1/2 lg:w-1/3 xl:w-1/3">
        <a href="/vendors/{{ $vendor->id}}" class="bg-blue-600 flex flex-col flex-1 rounded-lg shadow hover:shadow-lg translateY-2px m-2 no-underline transition">
                @if ($showimage)
                    <div class="aspect-16x9 rounded-t-lg"
                        style="background:url('{{  Storage::url($vendor->imagefile) }}') no-repeat center center/cover">
                    </div>
                @endif
                <p class="p-2 text-gray-100 text-base font-light text-center">{{ $vendor->name }} </p>

                <div class="p-2 bg-gray-300 flex flex-col flex-1 subpixel-antialiased">
                    <p class="w-full  py-2 text-sm text-gray-600 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        <span>
                        {{$vendor->district}}
                        {{$vendor->province}}  {{ $vendor->postal_code}}</span>
                    </p>
                    <div class="mb-3 w-full mx-auto text-left text-sm font-thin flex-1 ">
                        <p> {{Str::of( $vendor->description)->limit(100) }} </p>
                    </div>
                    <div class="w-full flex flex-row border-t border-gray-100 text-sm font-thin">
                        <div class="text-left w-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                            <span class="pl-8 py-2">{{  $vendor->visits()->count() }} </span>
                        </div>
                        <div class="text-right w-1/2">{{ $vendor->user->name }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
