<div class="flex py-4 lg:px-4 px-2 ">
    <div class="items-center w-1/4">
        <a class="flex flex-col items-center" href="/profile/{{ $message->user->id }}">
            <img class="w-8 h-8 rounded-full mr-2" src="{{  Storage::url($message->user->avatar) }}" alt="{{ $message->user->name }}">
            <p class="text-gray-900 leading-none text-sm mt-1">{{ $message->user->name }}</p>
        </a>
    </div>
    <div class="flex flex-col  rounded-lg  ml-2 w-3/4">
        <div class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-16">
            {{ $message->body }}
        </div>
        <div class="">
            <small>เมื่อ {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
