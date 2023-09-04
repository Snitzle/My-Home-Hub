@foreach( config('reminder.reminder_frequency') as $reminder )

    @php $reminder_frequency_index = array_search( $reminder, config('reminder.reminder_frequency') ) @endphp

    <option
        value="{{ $reminder_frequency_index }}"
        @if( isset( $bin ) && $reminder_frequency_index === $bin->reminder_frequency ) selected @endif >
        {{ $reminder }}
    </option>

@endforeach
