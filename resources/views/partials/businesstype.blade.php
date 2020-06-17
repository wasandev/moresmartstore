<div class="w-max-full mx-auto">
    {{--category --}}
    @include('partials.headbar',[
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute  "><path d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z"/></svg>',
        'title' => 'ประเภทธุรกิจ',
        'link' => '/vendors',
        'linktext' => 'แสดงทั้งหมด',
        'target' => '_self'
    ])
    <div class="w-full xl:mx-0 rounded-lg">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 xl:grid-cols-6">

            @foreach ($businesstypes as $businesstype)

                    <a href="/vendors/type/{{ $businesstype->id }}" class="flex flex-col  rounded shadow hover:shadow-xl translateY-2px m-2 no-underline transition text-gray-100 bg-indigo-500 hover:bg-blue-700 ">
                        <div class="rounded-t-lg self-center">
                            <svg class="fill-current  text-center mt-4" width="60" height="60"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2 2v10h16V6H2z"/>
                            </svg>
                        </div>
                        <div class="p-2 mt-2 space-y-0 flex-1 ">
                            <p class="mb-2 text-sm font-thin text-center">{{ $businesstype->name }}</p>
                         </div>
                        <div class="p-2 space-y-0 bg-gray-300 text-gray-900 border-t">
                            <p class="text-sm font-thin text-center">( {{ $businesstype->vendors_count }} ธุรกิจ )</p>
                        </div>
                    </a>

            @endforeach
        </div>
    </div>

</div>
