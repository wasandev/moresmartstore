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
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 xl:grid-cols-6">

            @foreach ($businesstypes as $businesstype)

                    <a href="/vendors/type/{{ $businesstype->id }}" class="flex flex-col  border border-gray-200 hover:shadow-md translateY-2px m-4 no-underline transition bg-gray-200 text-gray-600 hover:text-gray-100  hover:bg-blue-600 ">
                       <div class="p-2 flex-1 ">
                            <svg class="fill-current absolute " width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z"/>
                            </svg>

                            <span class="ml-6 text-base font-thin ">{{ $businesstype->name }}</span>
                            <span class="text-sm font-thin ">( {{ $businesstype->vendors_count }} ธุรกิจ )</span>
                        </div>

                    </a>

            @endforeach
        </div>
    </div>

</div>
