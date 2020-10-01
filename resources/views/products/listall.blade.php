
    @if (!empty(  $query ))
    <p class="p-4"> ผลการค้นหา <b> {{ $query }} </b> :
        <a href="/products" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
    </p>
    @endif
     <div class="px-2">
        @if(isset($products))
            @include('products.card',[
                'showimage' => 0
            ])
            {{ $products->links('vendor.pagination.tailwind') }}

        @elseif(isset($message))
            <p class="text-red-500">{{ $message }}</p>
            <a href="/products" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
        @endif
     </div>
