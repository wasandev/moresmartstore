<div id="app">
    @if (!empty($vendor->location_lat) || !empty($vendor->location_lat  ))
        <vendor-map :markers='[
            {"lat":{{$vendor->location_lat}},"lng":{{$vendor->location_lng}}}
             ]' >
        </vendor-map>
    @endif
</div>
