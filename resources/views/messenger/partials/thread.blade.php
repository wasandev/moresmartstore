<?php $class = $thread->isUnread(Auth::id()) ? 'text-gray-700 font-semibold bg-gray-100' : 'text-gray-600'; ?>

<tr class="{{$class}}   ">
    <td class="border px-2 py-2 text-center ">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</td>

    <td class="border px-2 py-2">
        <a class="hover:text-blue-500  " href="{{ route('messages.show', $thread->id) }}">
            <span>{{ $thread->subject }}</span>
            <span> - {{ Str::of( $thread->latestMessage->body)->limit(200) }}</span>
        </a>
    </td>
    <td class="border px-2 py-2">
        <a class="hover:text-blue-500  " href="/profile/{{$thread->creator()->id }}">
            {{ $thread->creator()->name }}
        </a>
    </td>
    <td class="border px-2 py-2">{{ formatDateThai( $thread->updated_at ) }}</td>
</tr>


