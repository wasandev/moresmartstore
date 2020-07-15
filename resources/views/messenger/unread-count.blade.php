@if(Auth::check())
    <?php
    $count = Auth::user()->newThreadsCount();
    $cssClass = $count == 0 ? 'hidden' : '';
    ?>
    <span id="unread_messages" class="text-red-500 {{ $cssClass }}">({{ $count }})</span>
@endif

