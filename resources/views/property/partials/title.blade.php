<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    @if ( $property->name !== "" )
        {{ $property->name }}
    @else
        {{ __($property->address->address_1 ) }}
    @endif
</h2>
