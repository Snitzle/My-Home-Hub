@foreach( config('bins.collection_frequency') as $collection )

    @php $collection_frequency_index = array_search( $collection, config('bins.collection_frequency') ) @endphp

    <option
        value="{{ $collection_frequency_index }}"
        @if( isset( $bin ) && $collection_frequency_index === $bin->collection_frequency ) selected @endif >
        {{ $collection }}
    </option>

@endforeach
