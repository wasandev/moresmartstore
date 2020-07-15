<div class=" w-full  p-2">
    <h2>ตอบกลับ</h2>
    <form action="{{ route('messages.update', $thread->id) }}" method="post">
        {{ method_field('put') }}
        {{ csrf_field() }}


        <!-- Message Form Input -->
            <div class="">
                <textarea name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-16">
                    {{ old('message') }}
                </textarea>
            </div>
            <div class="flex flex-row justify-between">
              <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">ส่งข้อความ</button>
              <a href="/messages" type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">ปิด</a>
            </div>


    </form>
</div>
