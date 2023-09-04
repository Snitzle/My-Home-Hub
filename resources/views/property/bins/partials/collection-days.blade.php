@foreach( config('bins.collection_days') as $collection )

    @php $collection_day_index = array_search( $collection, config('bins.collection_days') ); @endphp

    <option
        value="{{ $collection_day_index }}"
        @if( isset( $bin ) && $collection_day_index === $bin->collection_day ) selected @endif >

            {{ $collection }}

    </option>

@endforeach
