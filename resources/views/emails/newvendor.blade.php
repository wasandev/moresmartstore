@component('mail::message')
มีธุรกิจมาใหม่ใน mStore รอการอนุมัติ

ชื่อธุรกิจ: {{$name}}
เพิ่มโดย: {{ $user }}

ไปที่ link ด้านล่างเพื่อตรวจสอบ,
@component('mail::button', ['url' => $url,'color' => 'success'])
ตรวจสอบข้อมูลธุรกิจ
@endcomponent

ขอบคุณ,<br>
{{ config('app.name') }}
@endcomponent
