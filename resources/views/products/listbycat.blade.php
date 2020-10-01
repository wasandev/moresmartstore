<div class="p-4">
    <h1 class="font-normal text-2xl text-grey-darkest leading-none">
        {{ $categoryData->name}}
    </h1>

</div>

 <div class="w-full mx-auto px-2">
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
