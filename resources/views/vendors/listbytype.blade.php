    <div class="py-2 px-4">
        <h1 class="font-normal text-3xl text-grey-darkest leading-none mb-4">
            {{ $btype->name}}
        </h1>

        <!-- description -->
        <div class="mb-4">
            <p>{{ $btype->description }}</p>
        </div>

</div>

<div class="p-4">
    @if(isset($vendors))
        @include('vendors.card',[
            'showimage' => 0
        ])
        {{ $vendors->links('vendor.pagination.tailwind') }}

    @elseif(isset($message))

        <p class="text-red-500">{{ $message }}</p>
        <a href="/vendors" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
    @endif
</div>
@include('partials.googleads1')
