@extends('layouts.app')


@section('content')

@include('partials.header')
<div id="app">
    <form
        class="bg-white shadow-md rounded-lg p-4 max-w-xs mx-auto"
        method="POST" action="{{ route('register') }}">

        {{ csrf_field() }}
        @component('partials.heading')
            {{ __('auth.register') }}
        @endcomponent
        @if ($errors->any())
        <p class="text-center font-normal text-red my-3">
            @if ($errors->has('name'))
                {{ $errors->first('name') }}
            @elseif ($errors->has('email'))
                {{ $errors->first('email    ') }}
            @elseif ($errors->has('role'))
                {{ $errors->first('role') }}
            @elseif ($errors->has('terms'))
                {{ $errors->first('terms') }}
            @else
                {{ $errors->first('password') }}
            @endif
        </p>
        @endif
        <div class="mb-1 {{ $errors->has('name') ? ' has-error' : ''  }}">
            <label  class="block font-thin mb-1" for="name">{{ __('auth.name') }}</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="mb-1 {{ $errors->has('email') ? ' has-error' :'' }}">
            <label class="block font-thin mb-1" for="email">{{ __('auth.email') }}</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>


        <div class=" mb-1 {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="block font-thin mb-1" for="password">{{ __('auth.password') }}</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>

        </div>

        <div class="mb-1  {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="block thin mb-1" for="password_confirmation" >{{ __('auth.Confirm Password') }}</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" name="password_confirmation" required>

        </div>


        <div  class="flex mb-1 text-center">
            <label class="flex items-center block text-xl font-bold">
                <input class="" type="checkbox" name="terms" required>
                <button  class="text-grey-darkest  no-underline hover:text-red-500" @click="termModalShowing = true">
                    <span class="text-sm ml-2">ยอมรับข้อตกลงในการใช้บริการ</span>

                </button>
            </label>

        </div>

        <div class="mb-4 w-full mx-auto text-center">
            <button class="w-full inline-block px-2 py-2 rounded  btn btn-blue btn-blue:hover focus:outline-none focus:shadow-outline tracking-wider" type="submit">
            {{ __('auth.register') }}
            </button>

        </div>

    </form>
    <div>

        <terms-modal :showing="termModalShowing" @close="termModalShowing = false">
            <h2 class="text-xl font-bold text-gray-900">ข้อตกลงในการใช้บริการ</h2>
            <p class="mb-6">
                การบริการใดๆ จาก Moresmartstore.com ซึ่งเราขอแทนว่า “ผู้ให้บริการ” และลูกค้าหรือผู้ที่ใช้บริการใดๆ จากทางเราจะขอเรียกแทนว่า “ผู้ใช้บริการ” โดยมี ระเบียบ เงื่อนไข และข้อตกลงในการใช้บริการ ดังต่อไปนี้
            </p>
            <p>
                <ul>
                    <li>1. ห้ามผู้ใช้บริการ นำบริการนี้ไปโจมตี หลอกลวง ระบบหรือบุคคลอื่น เช่น DoS, Spam, Hack, Phishing และวิธีการอื่นที่คล้ายกันนี้</li>
                    <li>2. ห้ามผู้ใช้บริการ นำบริการนี้ไปกระทำการใดๆที่ละเมิดต่อสถาบันพระมหากษัตริย์ หรือขัดต่อความสงบของประเทศ</li>
                    <li>3. ห้ามผู้ใช้บริการ นำบริการนี้ไปใช้ในการเผยแพร่ หรือจัดเก็บสิ่งใดๆ ที่ส่อเค้าไปในทางทุจริต ผิดกฎหมาย ลามกอนาจาร โป๊เปลือย ผิดศีลธรรม บริการ Proxy Server (VPN), BitTorrent ไม่ว่าด้วยวิธีการหลบเลี่ยงใด รวมไปถึงโปรแกรมผิดกฏหมายที่จัดทำขึ้นโดยไม่ได้รับอนุญาตจากเจ้าของลิขสิทธิ์อย่างเป็นทางการ </li>
                    <li>4. ห้ามผู้ใช้บริการ นำบริการนี้ไปใช้ส่ง Email ที่มีลักษณะ Spam หรือส่ง Email หาผู้รับ โดยที่ผู้รับไม่ยินยอม ไม่ว่าจะส่งออกด้วยวิธีการใดก็ตาม</li>
                    <li>5. ผู้ใช้บริการจำเป็นต้องระบุข้อมูลที่ใช้ในการลงทะเบียน สมัครใช้บริการกับทางผู้ให้บริการตามความเป็นจริงทั้งหมด หากพบว่ามีข้อมูลใดที่ไม่เป็นจริง ผู้ให้บริการขอยกเลิกการให้บริการในทันที</li>
                    <li>6. ผู้ให้บริการขอยกเลิกผู้ใช้บริการที่พยายาม หรือกระทำการใดๆ ที่เสียหาย หรือเป็นอันตรายต่อระบบของผู้ให้บริการในทันที และจะดำเนินการทางคดีตามกฏหมายอย่างถึงที่สุด</li>
                    <li>7. ถ้าหากผู้ให้บริการให้รับการร้องเรียน ร้องขอ หรือพบเหตุที่ผิดปกติ ผู้ให้บริการขอใช้สิทธิ์ที่จะทำการระงับการบริการแก่ผู้ใช้บริการนั้นๆ เป็นการชั่วคราวเพื่อทำการสอบสวน และตรวจสอบหาสาเหตุของเหตุนั้นๆ โดยการตัดสินใจขึ้นอยู่กับดุลยพินิจของผู้ให้บริการ</li>
                    <li>8. ผู้ใช้บริการจะต้องเก็บรหัสผ่านใดๆ จากผู้ให้บริการเป็นความลับ และควรจะกำหนดรหัสผ่านให้มีความยากในการเข้าถึง และเปลี่ยนรหัสผ่านทุกเดือน</li>
                    <li>9. ผู้ให้บริการขอไม่รับผิดชอบเกี่ยวประสิทธิภาพ ความล่าช้า ความผิดพลาด ความสูญเสียข้อมูล หรือความเสียหายใดๆ ที่อยู่นอกเหนือการควบคุมของผู้ให้บริการ แต่ทั้งนี้ ผู้ให้บริการจะรักษาเสถียรภาพโดยรวมของระบบให้สามารถใช้บริการได้ดีอยู่เสมอ</li>
                    <li>10. ผู้ให้บริการขอสงวนสิทธ์ในการระงับการให้บริการชั่วคราวแก่ผู้ใช้บริการ และจะดำเนินการลบข้อมูลของผู้ใช้บริการออกจากระบบทันที หากมีการกระทำผิดเงื่อนไขใดๆ ภายใน 7 วัน นับจากวันที่เริ่มระงับการใช้บริการ</li>
                    <li>11. ผู้ให้บริการ จะเก็บรักษาข้อมูลของผู้ใช้บริการเป็นอย่างดีที่สุด และจะไม่มีการเปิดเผยต่อบุคคลใดๆ ยกเว้นในกรณีที่เกี่ยวข้องกับข้อพิพาททางกฎหมาย ผู้ให้บริการจำเป็นต้องให้ความร่วมมือกับเจ้าหน้าที่ตำรวจและเจ้าหน้าที่ราชการที่เกี่ยวข้อง ในการแจ้งข้อมูลใดๆ ที่มีประโยชน์ต่อการดำเนินคดี</li>
                    <li>12. ผู้ให้บริการมีสิทธิ์ที่จะปฏิเสธการขอใช้บริการ โดยไม่ต้องอธิบายเหตุผล</li>

                </ul>
                <br/>
            </p>
            <button
                class="btn btn-blue bg-blue-600 text-white px-4 py-2 text-sm uppercase tracking-wide font-bold rounded-lg"
                @click="termModalShowing = false"
                >
                ปิด
            </button>
        </terms-modal>
    </div>
</div>
@endsection
