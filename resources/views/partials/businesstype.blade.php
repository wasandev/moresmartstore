<div class="w-max-full mx-auto">


    {{--category --}}
    <div class="mx-4">
        <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">

            <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute  "><path d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z"/></svg>
                <span class="pl-8 py-2">ประเภทธุรกิจ</span>
            </div>
            <div class="text-sm w-1/2 font-thin text-right  subpixel-antialiased">
                <a class="px-2 py-1 mt-2  text-white rounded  bg-gray-500 hover:bg-blue-700" href="/classified">ดูทั้งหมด</a>
            </div>
        </div>
    </div>
    <div class="w-full xl:mx-0 rounded-lg">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 xl:grid-cols-6">

            @foreach ($businesstypes as $businesstype)

                <div >

                    <a href="/blog" class=" flex flex-col rounded shadow hover:shadow-xl translateY-2px m-4 no-underline transition text-gray-100 bg-indigo-500 hover:text-white hover:bg-blue-700">
                        <div class="rounded-t-lg self-center ">
                            <svg class="fill-current  text-center mt-4" width="60" height="60"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z" />
                            </svg>
                        </div>
                        <div class="p-2 flex flex-col flex-1  rounded-b-lg subpixel-antialiased">
                            <p class="mb-2 text-sm font-thin text-center">{{ $businesstype->name }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>
