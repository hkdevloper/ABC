<div class="mt-3 state hidden w-full">
    <label>State</label>
    <select name="state" class="select2 input w-full border mt-2" id="state">
        <option value="1">Select State</option>
        <option value="2">State 1</option>
        <option value="3">State 2</option>
        <option value="4">State 3</option>
        <option value="5">State 4</option>
    </select>
</div>
<div class="mt-3 city hidden w-full">
    <label>City</label>
    <select name="city" class="select2 input w-full border mt-2" id="city">
        <option value="1">Select City</option>
        <option value="2">City 1</option>
        <option value="3">City 2</option>
        <option value="4">City 3</option>
        <option value="5">City 4</option>
    </select>
</div>
<div class="mt-3">
    <label>Zip Code</label>
    <input type="text" class="input w-full border mt-2" name="zip_code"
           placeholder="Enter Zip Code here">
</div>
<div class="mt-3">
    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Cordinates</label>
    <div id="map-picker" class="w-full border mt-2 flex-1"
         style="width: 100%; height: 400px;"></div>
</div>
<div class="mt-3">
    <label class="w-full sm:w-20 sm:text-right sm:mr-5">longitude</label>
    <input name="longitude" type="text" class="input w-full border mt-2 flex-1" required
           readonly
           placeholder="" id="longitude" value="{{old('longitude')}}">
</div>
<div class="mt-3">
    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Latitude</label>
    <input name="latitude" type="text" class="input w-full border mt-2 flex-1" required
           readonly
           placeholder="" id="latitude" value="{{old('latitude')}}">
</div>

{{--        MAP Script--}}
<script>
    // Map
    let map = L.map('map-picker').setView([51.505, -0.09], 2);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    function onMapClick(e) {
        map.eachLayer(function (layer) {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });
        // Create a marker at the clicked location
        let marker = L.marker(e.latlng).addTo(map);

        $('#longitude').val(e.latlng.lng);
        $('#latitude').val(e.latlng.lat);
    }

    map.on('click', onMapClick);
</script>
{{--        AJAX dropdown location--}}
<script>
    $(document).ready(function () {
        // when country is selected
        $('#country').change(function () {
            let country_id = $(this).val();
            $.get('{{route('ajax.get.state.list')}}', {country_id: country_id}, function (data) {
                let state = $('#state');
                $('.state').toggle('hidden');
                state.empty();
                state.append('<option value="">Select State</option>');
                $.each(data, function (index, element) {
                    state.append('<option value="' + element.id + '">' + element.name + '</option>');
                });
            });
        });

        // when state is selected
        $('#state').change(function () {
            let state_id = $(this).val();
            $.get('{{route('ajax.get.city.list')}}', {state_id: state_id}, function (data) {
                let city = $('#city');
                $('.city').toggle('hidden');
                city.empty();
                city.append('<option value="">Select City</option>');
                $.each(data, function (index, element) {
                    city.append('<option value="' + element.id + '">' + element.name + '</option>');
                });
            });
        });

    });
</script>
