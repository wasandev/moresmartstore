<div class="grid grid-cols-1  md:grid-cols-2 ">
    @foreach ($blogs as $blog)
        <div>
            <a href="/blogs/{{ $blog->slug }}" class="flex flex-col  border border-gray-200 hover:shadow-lg translateY-2px m-2 p-2 lg:m-4 lg:p-4 no-underline transition">
                <div class="aspect-16x9 "
                    style="background:url('{{  Storage::url($blog->blog_image) }}') no-repeat center center/cover">
                </div>


                <div class="p-2 text-left rounded-b-lg ">
                    <p class="text-base font-semibold text-left text-blue-700 ">{{ $blog->title }}</p>


                </div>
                  {{-- <p class="text-sm text-gray-600"> {!! Str::of( $blog->blog_content)->limit(150) !!} </p> --}}

                <div class="px-2 flex flex-row w-full justify-between  border-t border-gray-100 text-sm font-thin ">

                    <div class="text-left  m-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        <span class="pl-8 py-2"> {{  $blog->visits()->count() }}  </span>
                    </div>

                    <div class="text-right  p-2 ">{{formatDateThai( $blog->published_at )}}</div>
                </div>
            </a>
        </div>
    @endforeach
</div>
