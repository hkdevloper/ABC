@extends('main')

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
                        Edit Location
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('edit.location', ['id'=> $location->id])}}" method="post"
                              class="intro-y box p-5"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Featured</label>
                                <input type="checkbox" name="featured" value="true"
                                       {{$location->featured ? 'checked' : ''}}
                                       class="input input--switch border pt-4">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Location</label>
                                <input name="location_name" type="text" class="input w-full border mt-2 flex-1" required
                                       value="{{$location->name}}" id="name">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                                <input name="slug" type="text" class="input w-full border mt-2 flex-1" required
                                       value="{{$location->slug}}" id="slug">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Summary</label>
                                <input name="summary" type="text" class="input w-full border mt-2 flex-1"
                                       value="{{$location->slug}}">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Description</label>
                                <textarea rows="10" name="description" class="input w-full border mt-2 flex-1"
                                          value="{{$location->description}}">{{old('description')}}</textarea>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Placement</label>
                                <input type="hidden" name="parent_id" value="{{$location->parent_id}}">
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
                                    </div>
                                    <div class="flex flex-row w-full sm:flex-row mt-2">
                                        <select class="input w-full border mt-2 flex-1" id="new-state"
                                                name="new_location">
                                            <option>Choose Location</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-row w-full sm:flex-row mt-2">
                                        <select class="input w-full border mt-2 flex-1" id="new-city"
                                                name="new_location">
                                            <option>Choose Location</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-row w-full sm:flex-row mt-2">
                                        <select class="input w-full border mt-2 flex-1 hidden" id="sub-location"
                                                name="sub_location">
                                            <option>Choose Location</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Cordinates</label>
                                <div id="map-picker" class="w-full border mt-2 flex-1"
                                     style="width: 300px; height: 400px;"></div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">longitude</label>
                                <input name="longitude" type="text" class="input w-full border mt-2 flex-1" required
                                       readonly
                                       value="{{$location->longitude}}" id="longitude"
                                >
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Latitude</label>
                                <input name="latitude" type="text" class="input w-full border mt-2 flex-1" required
                                       readonly
                                       value="{{$location->latitude}}" id="latitude">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Map Zoom Level</label>
                                <input name="zoom" type="text" class="input w-full border mt-2 flex-1" required
                                       value="{{$location->map_zoom_level}}">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Logo</label>
                                <input name="file" id="logo_image" type="file" class="filepond w-full p-2 m-1"/>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Header Image</label>
                                <input name="file" id="header_image" type="file" class="filepond w-full p-2 m-1"/>
                            </div>
                            <input name="logo_image_id" id="logo_image_id" type="hidden"/>
                            <input name="header_image_id" id="header_image_id" type="hidden"/>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Title</label>
                                <input name="meta_title" type="text" class="input w-full border mt-2 flex-1" required
                                       value="{{$seo->title}}">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Keywords</label>
                                <input name="meta_keywords" type="text" class="input w-full border mt-2 flex-1" required
                                       value="{{$seo->meta_keywords}}" id="tag-keyword"
                                >
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Description</label>
                                <input name="meta_description" type="text" class="input w-full border mt-2 flex-1"
                                       required
                                       value="{{$seo->meta_description}}">
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
            {{-- Filepond Plugins --}}
            <script
                src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
            <script
                src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
            <script
                src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
            <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
            <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
            <script
                src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
            <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>

            <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
            <script>
                FilePond.registerPlugin(
                    FilePondPluginFileValidateType,
                    FilePondPluginImageExifOrientation,
                    FilePondPluginImagePreview,
                    FilePondPluginImageCrop,
                    FilePondPluginImageResize,
                    FilePondPluginImageTransform,
                    FilePondPluginImageEdit
                );
                let folder = null;
                // Select the file input and use
                // create() to turn it into a pond
                FilePond.create(
                    document.getElementById('logo_image'),
                    {
                        labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
                        imagePreviewHeight: 170,
                        imageCropAspectRatio: '1:1',
                        imageResizeTargetWidth: 200,
                        imageResizeTargetHeight: 200,
                        allowMultiple: false,
                    }
                ).setOptions({
                    server: {
                        timeout: 7000,
                        process: {
                            url: '{{ route('filepond.process') }}',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'upload_type': 'location_logo'
                            },
                            withCredentials: false,
                            onload: (response) => {
                                response = JSON.parse(response);
                                folder = response.folder;
                                $('#logo_image_id').val(folder);
                            }
                        },
                        revert: () => {
                            $.ajax({
                                url: '{{ route('filepond.revert') }}',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {
                                    folder: folder,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function (data) {
                                    $('#logo_image_id').val('')
                                }
                            });
                        },
                    },

                });

                FilePond.create(
                    document.getElementById('header_image'),
                    {
                        labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
                        imagePreviewHeight: 170,
                        imageCropAspectRatio: '1:1',
                        imageResizeTargetWidth: 200,
                        imageResizeTargetHeight: 200,
                        allowMultiple: false,
                    }
                ).setOptions({
                    server: {
                        timeout: 7000,
                        process: {
                            url: '{{ route('filepond.process') }}',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'upload_type': 'location_header'
                            },
                            withCredentials: false,
                            onload: (response) => {
                                response = JSON.parse(response);
                                folder = response.folder;
                                $('#header_image_id').val(folder);
                            }
                        },
                        revert: () => {
                            $.ajax({
                                url: '{{ route('filepond.revert') }}',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {
                                    folder: folder,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function (data) {
                                    $('#header_image_id').val('')
                                }
                            });
                        },
                    },
                });


                FilePond.parse(document.body);
            </script>
            <script>
                // Map
                let map = L.map('map-picker').setView([51.505, -0.09], 2);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                L.marker({
                    lat: {{$location->latitude }},
                    lng: {{$location->longitude }}
                }).addTo(map);

                function onMapClick(e) {
                    console.log(e.latlng);
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
            <script>
                $(document).ready(function () {
                    let country = $('#new-location');
                    let state = $('#new-state');
                    let city = $('#new-city');
                    state.hide();
                    city.hide();
                    $.get('{{route('ajax.get.country.list')}}', function (data) {
                        country.empty();
                        country.append('<option value="">Select Country</option>');
                        $.each(data, function (index, element) {
                            country.append('<option value="' + element.id + '">' + element.name + '</option>');
                        });
                    });

                    // when country is selected
                    country.change(function () {
                        let country_id = $(this).val();
                        $.get('{{route('ajax.get.state.list')}}', {country_id: country_id}, function (data) {
                            state.show();
                            state.empty();
                            state.append('<option value="">Select State</option>');
                            $.each(data, function (index, element) {
                                state.append('<option value="' + element.id + '">' + element.name + '</option>');
                            });
                        });
                    });

                    // when state is selected
                    state.change(function () {
                        let state_id = $(this).val();
                        $.get('{{route('ajax.get.city.list')}}', {state_id: state_id}, function (data) {
                            city.show();
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
