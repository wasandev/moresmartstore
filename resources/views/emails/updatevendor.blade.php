@component('mail::message')
มีการแก้ข้อมูลธุรกิจใน mStore ที่ต้องตรวจสอบ

ชื่อธุรกิจ: {{$name}}
แก้ไขโดย: {{ $user }}

ไปที่ link ด้านล่างเพื่อตรวจสอบ,
@component('mail::button', ['url' => $url,'color' => 'success'])
ตรวจสอบข้อมูลธุรกิจ
@endcomponent

ขอบคุณ,<br>
{{ config('app.name') }}
@endcomponent
