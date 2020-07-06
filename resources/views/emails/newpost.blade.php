@component('mail::message')
มีโพสมาใหม่ใน mStore รอการอนุมัติ

ชื่อโพส: {{$name}}
เพิ่มโดย: {{ $user }}

ไปที่ link ด้านล่างเพื่อตรวจสอบ,
@component('mail::button', ['url' => $url,'color' => 'success'])
ตรวจสอบข้อมูลโพส
@endcomponent

ขอบคุณ,<br>
{{ config('app.name') }}
@endcomponent
