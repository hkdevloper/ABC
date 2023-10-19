<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <div id="map" style="height: {{$height}};"></div>
    <script>
        var map = L.map('map').setView([{{$center}}], {{$zoom}});
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script>
</x-dynamic-component>
