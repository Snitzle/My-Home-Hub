<x-admin-page-title>
    @if ( $property->name !== "" )
        {{ $property->name }}
    @else
        {{ __($property->address->address_1 ) }}
    @endif
</x-admin-page-title>
