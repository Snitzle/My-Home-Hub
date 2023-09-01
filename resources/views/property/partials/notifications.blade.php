@if( $errors->any())
    <div class="mb-4">
        <div class="bg-red-500 overflow-hidden shadow-sm sm:rounded-lg p-6">
            @foreach ( $errors->all() as $error)
                <p class="mb-0 font-bold text-white">{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif

@if( session('success') )
    <div class="mb-4">
        <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="mb-0 font-bold text-white">
                {{ session('success') }}
            </p>
        </div>
    </div>
@endif

