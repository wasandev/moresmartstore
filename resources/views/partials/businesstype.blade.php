<div class=" max-w-full mx-4">
    {{--category --}}
    @include('partials.headbar',[
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute  "><path d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z"/></svg>',
        'title' => 'ประเภทธุรกิจ',
        'link' => '/vendors',
        'linktext' => 'แสดงทั้งหมด',
        'target' => '_self'
    ])
    <div class="w-full">
        <div class="grid grid-cols-2  md:grid-cols-4 gap-1">

            @foreach ($businesstypes as $businesstype)

                    <a href="/vendors/type/{{ $businesstype->id }}" class="flex flex-col  rounded  hover:shadow-md translateY-2px m-2 p-2 no-underline transition bg-yellow-300 text-gray-800 hover:text-gray-100  hover:bg-blue-700 ">
                        <div class="">
                            <svg class="fill-current mt-2" width="40" height="40"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2 2v10h16V6H2z"/>
                            </svg>
                        </div>
                        <div class=" flex-1 ">
                            <p class="text-sm font-thin ">{{ $businesstype->name }} ( {{ $businesstype->vendors_count }} ธุรกิจ )</p>
                         </div>

                    </a>

            @endforeach
        </div>
    </div>

</div>
