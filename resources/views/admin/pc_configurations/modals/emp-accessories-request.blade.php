<div class="modal fade" id="mdl-accessories-request-total" tabindex="-1" role="dialog" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-accessories-request-label">
                    Total Requested Accessories
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $accessoriesList = \App\Models\AccessoriesItem::all();
                    $totalCount = [];
                    foreach ($accessoriesList as $item) {
                        $totalCount[$item->slug] = \App\Models\AccessoriesRequestItem::where('accessory_id', $item->id)->where('status', 'approved')->count();
                    }
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th>Accessories</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Keyboard</td>
                            <td>{{ $totalCount['keyboard'] }}</td>
                        </tr>
                        <tr>
                            <td>Mouse</td>
                            <td>{{ $totalCount['mouse'] }}</td>
                        </tr>
                        <tr>
                            <td>Headset</td>
                            <td>{{ $totalCount['headphone'] }}</td>
                        </tr>
                        <tr>
                            <td>Mouse Pad</td>
                            <td>{{ $totalCount['mouse-pad'] }}</td>
                        </tr>
                        <tr>
                            <td>Monitor</td>
                            <td>{{ $totalCount['monitor'] }}</td>
                        </tr>
                        <tr>
                            <td>UPS</td>
                            <td>{{ $totalCount['ups'] }}</td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td>{{ $totalCount['processor'] }}</td>
                        </tr>
                        <tr>
                            <td>Motherboard</td>
                            <td>{{ $totalCount['motherboard'] }}</td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td>{{ $totalCount['ram'] }}</td>
                        </tr>
                        <tr>
                            <td>PSU</td>
                            <td>{{ $totalCount['psu'] }}</td>
                        </tr>
                        <tr>
                            <td>GPU</td>
                            <td>{{ $totalCount['gpu'] }}</td>
                        </tr>
                        <tr>
                            <td>HDD</td>
                            <td>{{ $totalCount['hdd'] }}</td>
                        </tr>
                        <tr>
                            <td>SSD</td>
                            <td>{{ $totalCount['ssd'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
