@component('mail::message')

Project created : {{ $project->title }} ;
{{ $project->description }}




@component('mail::button', ['url' => url('show/' .$project->id)])
Visit Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
