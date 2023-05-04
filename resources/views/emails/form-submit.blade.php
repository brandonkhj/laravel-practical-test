@component('mail::message')
    <h1>Form Submitted @ {{ $form->created_at->format('Y-m-d H:i:s') }}</h1>

    @foreach ($form->inputs as $input)
        {{ $input['type'] }} : {{ $input['value'] }}
    @endforeach
@endcomponent
