@extends('layouts.main-admin')

@section("head")
    <link rel="stylesheet" href="{{url("/")}}/dist/css/leaflet.css">
    <script src="{{url("/")}}/dist/js/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet"/>
@endsection

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add Location
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('add.location')}}" method="post" class="intro-y box p-5"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Featured</label>
                                <input type="checkbox" name="featured" value="true"
                                       class="input input--switch border pt-4">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Location</label>
                                <input name="location_name" type="text" class="input w-full border mt-2 flex-1" required
                                       placeholder="Enter Location Name" id="name" value="{{old('location_name')}}">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                                <input name="slug" type="text" class="input w-full border mt-2 flex-1" required
                                       placeholder="AAA>>bb>>c" id="slug" value="{{old('slug')}}">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Summary</label>
                                <input name="summary" type="text" class="input w-full border mt-2 flex-1"
                                       placeholder="Summary" value="{{old('summary')}}">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Placement</label>
                                <div class="mt-3 p-1">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2">
                                            <input name="placement" type="radio" class="input border mr-2" id="rd-new"
                                                   value="rd-new">
                                            <label class="cursor-pointer select-none" for="rd-new">New location</label>
                                        </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                            <input name="placement" type="radio" class="input border mr-2" id="rd-sub"
                                                   value="rd-sub">
                                            <label class="cursor-pointer select-none" for="rd-sub">Sub-location
                                                of</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-row w-full sm:flex-row mt-2">
                                        <select class="input w-full border mt-2 flex-1" id="new-location"
                                                name="new_location">
                                            <option>Choose Location</option>
                                        </select>
                                        <select class="input w-full border mt-2 flex-1 hidden" id="sub-location"
                                                name="sub_location">
                                            <option>Choose Location</option>
                                        </select>
                                    </div>
                                </div>
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
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Map Zoom Level</label>
                                <input name="zoom" type="text" class="input w-full border mt-2 flex-1" required
                                       placeholder="2" value="{{old('zoom')}}">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Title</label>
                                <input name="meta_title" type="text" class="input w-full border mt-2 flex-1" required
                                       placeholder="" value="{{old('meta_title')}}">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Keywords</label>
                                <input name="meta_keywords" type="text" class="input w-full border mt-2 flex-1" required
                                       placeholder=", (comma seperated values)" id="tag-keyword"
                                       value="{{old('meta_keywords')}}">
                            </div>
                            <div class="mt-3">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Description</label>
                                <input name="meta_description" type="text" class="input w-full border mt-2 flex-1"
                                       required
                                       placeholder="" value="{{old('meta_description')}}">
                            </div>
                            <div class="text-right mt-5">
                                <a href="{{url()->previous()}}" class="button w-24 border text-gray-700 mr-1">Cancel</a>
                                <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                            </div>
                        </form>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('page-scripts')
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

                // Tagify Tag input
                let input = document.getElementById('tag-keyword');
                let tagify = new Tagify(input, {
                    whitelist: [],
                    maxTags: 10,
                    dropdown: {
                        enabled: 1,
                        maxItems: 10,
                        classname: "tags-look",
                        closeOnSelect: false
                    }
                });

                // Slug Generator
                $('#name').keyup(function () {
                    $('#slug').val(generateSlug($(this).val()));
                });

                function generateSlug(input) {
                    // Convert input to lowercase and remove leading/trailing whitespaces
                    let slug = input.toLowerCase().trim();

                    // Replace special characters with dashes
                    slug = slug.replace(/[^a-z0-9]+/g, '-');

                    // Remove any remaining leading/trailing dashes
                    slug = slug.replace(/^-+|-+$/g, '');

                    // Return the generated slug
                    return slug;
                }
            </script>
{{--        AJAX dropdown location--}}
            <script>
                $(document).ready(function () {
                    $.get('{{route('ajax.get.country.list')}}', function (data) {
                        console.table(data);
                        let country = $('#new-location');
                        country.empty();
                        country.append('<option value="">Select Country</option>');
                        $.each(data, function (index, element) {
                            country.append('<option value="' + element.id + '">' + element.name + '</option>');
                        });
                    });

                    // when country is selected
                    $('#new-location').change(function () {
                        let country_id = $(this).val();
                        $.get('{{route('ajax.get.state.list')}}', {country_id: country_id}, function (data) {
                            console.table(data);
                            let state = $('#new-state');
                            state.toggle('hidden');
                            state.empty();
                            state.append('<option value="">Select State</option>');
                            $.each(data, function (index, element) {
                                state.append('<option value="' + element.id + '">' + element.name + '</option>');
                            });
                        });
                    });

                    // when state is selected
                    $('#new-state').change(function () {
                        let state_id = $(this).val();
                        $.get('{{route('ajax.get.city.list')}}', {state_id: state_id}, function (data) {
                            console.table(data);
                            let city = $('#new-city');
                            city.toggle('hidden');
                            city.empty();
                            city.append('<option value="">Select City</option>');
                            $.each(data, function (index, element) {
                                city.append('<option value="' + element.id + '">' + element.name + '</option>');
                            });
                        });
                    });

                });
            </script>
@endsection
