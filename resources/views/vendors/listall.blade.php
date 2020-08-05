
    @if (!empty( $query ))
    <div class="p-4">
        <p class="px-2"> ผลการค้นหา <b> {{ $query }} </b> :
            <a href="/vendors" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
        </p>
    </div>
    @endif

    @if(isset($vendors))

        @include('vendors.card',[
                'showimage' => 0
            ])
        {{ $vendors->links('vendor.pagination.tailwind') }}


    @elseif(isset($message))
        <div class="p-4">
            <p class="text-red-500">{{ $message }}</p>
            <a href="/vendors" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
        </div>
    @endif
