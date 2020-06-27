@component('mail::message')
สวัสดี , {{ $user }}
ธุรกิจ: {{$name}} ที่ท่านเพิ่มใน mStore ได้รับการอนุมัติให้แสดงผลแล้ว

ดูข้อมูลธุรกิจของท่านได้ link ด้านล่างนี้,
@component('mail::button', ['url' => $url,'color' => 'success'])
ดูข้อมูลธุรกิจ
@endcomponent

ขอขอบคุณ,<br>
{{ config('app.name') }}
@endcomponent
