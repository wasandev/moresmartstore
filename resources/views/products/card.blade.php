<div class="flex flex-wrap w-full xl:mx-0">
    @foreach ($products as $product)
    <div class="w-full flex flex-col md:w-1/2 lg:w-1/4 xl:w-1/4">
        <a href="/products/{{ $product->id }}" class="bg-blue-500 flex flex-col flex-1 rounded-t-lg shadow hover:shadow-lg translateY-2px m-2 no-underline transition">
                @if ($showimage)
                    <div class="aspect-16x9 rounded-t-lg"
                        style="background:url('{{  Storage::url($product->image) }}') no-repeat center center/cover">
                    </div>

                @endif
                <p class="p-2 text-gray-100 text-base font-light text-center">{{ $product->name }} </p>

                <div class="p-2 bg-white flex flex-col subpixel-antialiased flex-1">

                    <div class="mb-3 w-full mx-auto text-left text-sm font-thin flex-1 ">
                        <p> {{ Str::of( $product->description)->limit(200) }} </p>
                        @auth
                            @if (Auth::user()->id == $product->user->id)

                                <p class="text-red-600 text-sm">
                                    @if ( $product->status)
                                        <span class="text-right">-เผยแพร่แล้ว-</span>
                                    @else
                                        <span class="text-right">-รอการอนุมัติ-</span>
                                    @endif
                                </p>
                            @endif
                        @endauth
                    </div>
                    <div class="mb-3 w-full mx-auto  text-base text-blue-700 items-end">

                        <p class="text-gray-600 text-sm ">ประเภท: {{ $product->category->name }}</p>
                        <p class="text-gray-600 text-sm ">ชื่อธุรกิจ: {{ $product->vendor->name }} </p>
                        <p class="text-gray-600 text-sm ">ผู้โพส: {{ $product->user->name}} </p>
                    </div>
                    <div class="w-full flex flex-row border-t border-gray-100 text-sm font-thin">
                        <div class="mt-2 text-left w-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                            <span class="pl-8 py-2">การดู {{  $product->visits()->count() }} ครั้ง </span>
                        </div>
                        @if (!is_null($product->unit_id))
                            <div class="mt-2 text-right w-1/2 text-red-500">{{ number_format($product->price,2) }} บาท/{{$product->unit->name}}</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
