<div class="">

    <div class=" overflow-hidden sm:rounded-lg mb-4">
        <div class=" text-gray-900">

            <h2>Menu</h2>

            <ul>

                <li>
                    <a href="{{ route( 'property.job.index', $property->id ) }}">Jobs</a>
                </li>

                <li>
                    <a href="{{ route( 'property.bill.index', $property->id ) }}">Bills</a>
                </li>

                <li>
                    <a href="{{ route( 'property.boiler.index', $property->id ) }}">Boiler</a>
                </li>

                <li>
                    <a href="{{ route( 'property.job.index', $property->id ) }}">Subscriptions</a>
                </li>

                <li>
                    <a href="{{ route( 'property.job.index', $property->id ) }}">Bin Days</a>
                </li>

                <li>
                    <a href="{{ route( 'property.job.index', $property->id ) }}">Contents</a>
                </li>

                <li>
                    <a href="{{ route( 'property.job.index', $property->id ) }}">Files</a>
                </li>

                <li>
                    <a href="{{ route( 'property.options.show', $property->id ) }}">Options</a>
                </li>

            </ul>

        </div>
    </div>

</div>
