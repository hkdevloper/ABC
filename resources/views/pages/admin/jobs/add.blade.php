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
                        Add New Job
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <form action="{{route('add.job')}}" method="post" enctype="multipart/form-data"
                      class="intro-y datatable-wrapper box p-5 mt-5">
                    <div style="display: flex">
                        <div style="margin-right: 50px">
                            <label>Approved</label>
                            <br>
                            <input type="checkbox" checked class="input w-full input--switch border" name="is_approved">
                        </div>
                        <div style="margin-right: 50px">
                            <label>Featured</label>
                            <br>
                            <input type="checkbox" class="input w-full input--switch border" name="is_featured">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Select User</label>
                        <select name="user" required class="select2 input w-full border mt-2">
                            <option selected>Select user</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->first_name}}&nbsp;{{$user->last_name}}
                                    &nbsp;[Id: {{$user->id}}]
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Category</label>
                        <select name="category" required class="select2 input w-full border mt-2">
                            <option selected>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Job Thumbnail</label>
                        <input type="file" id="media_file" class="input w-full border mt-2" name="file" required>
                    </div>
                    <input name="media" id="media" type="hidden" required/>
                    <div class="mb-4">
                        <label class="block mb-1">Title</label>
                        <input type="text" name="title" class="input w-full border mt-1" placeholder="Title"
                               value="{{ old('title') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Slug</label>
                        <input type="text" name="slug" class="input w-full border mt-1" placeholder="Slug"
                               value="{{ old('slug') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Summary</label>
                        <input type="text" name="summary" class="input w-full border mt-1" placeholder="Summary"
                               value="{{ old('summary') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Description</label>
                        <textarea name="description" class="input w-full border mt-1" rows="4"
                                  placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label>Job Galley</label>
                        <input type="file" id="media_file_gallery" class="input w-full border mt-2" multiple
                               name="file">
                    </div>
                    <input name="gallery[]" id="gallery" type="hidden" required/>
                    <div class="mb-4">
                        <label class="block mb-1">Valid Until</label>
                        <input type="datetime-local" name="valid_until" class="input w-full border mt-1"
                               value="{{ old('valid_until') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Employment Type</label>
                        <input type="text" name="employment_type" class="input w-full border mt-1"
                               placeholder="Employment Type" value="{{ old('employment_type') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Salary</label>
                        <input type="text" name="salary" class="input w-full border mt-1" placeholder="Salary"
                               value="{{ old('salary') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Organization</label>
                        <input type="text" name="organization" class="input w-full border mt-1"
                               placeholder="Organization" value="{{ old('organization') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Overview</label>
                        <textarea name="overview" class="input w-full border mt-1" rows="4"
                                  placeholder="Overview">{{ old('overview') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Education</label>
                        <textarea name="education" class="input w-full border mt-1" rows="4"
                                  placeholder="Education">{{ old('education') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Experience</label>
                        <textarea name="experience" class="input w-full border mt-1" rows="4"
                                  placeholder="Experience">{{ old('experience') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label>Address</label>
                        <input type="text" class="input w-full border mt-2" name="address"
                               value="{{old('address')}}"
                               placeholder="Enter Address here">
                    </div>
                    <div class="mt-3 w-full">
                        <label>Country</label>
                        <select name="country" class="select2 input w-full border mt-2" id="country">
                            <option value="1">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 state hidden w-full">
                        <label style="display: block; width: 100%">State</label>
                        <select name="state" class="select2 input w-full border mt-2" style="width: 100% !important;"
                                id="state">
                            <option value="1">Select State</option>
                        </select>
                    </div>
                    <div class="mt-3 city hidden w-full">
                        <label style="display: block; width: 100%">City</label>
                        <select name="city" class="select2 input w-full border mt-2" id="city"
                                style="width: 100% !important;">
                            <option value="1">Select City</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Zip Code</label>
                        <input type="text" class="input w-full border mt-2" name="zip_code"
                               value="{{old('zip_code')}}"
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
                               placeholder="" id="longitude"
                               value="{{old('longitude')}}">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Latitude</label>
                        <input name="latitude" type="text" class="input w-full border mt-2 flex-1" required
                               readonly
                               placeholder="" id="latitude" value="{{old('latitude')}}">
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
                        <input name="meta_description" type="text" class="input w-full border mt-2 flex-1" required
                               value="{{old('meta_description')}}">
                    </div>
                    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('page-scripts')
    {{-- Scripts for this page goes here --}}
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
    {{--        Filepond JS--}}
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

        // Upload Logo
        FilePond.create(
            document.getElementById('media_file'),
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
                        'upload_type': 'category_thumbnail'
                    },
                    withCredentials: false,
                    onload: (response) => {
                        response = JSON.parse(response);
                        folder = response.folder;
                        $('#media').val(folder);
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
                            $('#media').val('')
                        }
                    });
                },
            },

        });
        // Upload Gallery
        FilePond.create(
            document.getElementById('media_file_gallery'),
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
                        'upload_type': 'category_thumbnail'
                    },
                    withCredentials: false,
                    onload: (response) => {
                        response = JSON.parse(response);
                        folder = response.folder;
                        // multiple gallery
                        let gallery = $('#gallery').val();
                        if (gallery === '') {
                            $('#gallery').val(folder);
                        } else {
                            $('#gallery').val(gallery + ',' + folder);
                        }
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
                            // remove deleted folder from gallery
                            let gallery = $('#gallery').val();
                            let newGallery = gallery.replace(folder, '');
                            $('#gallery').val(newGallery);
                        }
                    });
                },
            },

        });

        FilePond.parse(document.body);
    </script>
    {{--    TagiFY/Slug--}}
    <script>
        // Tagify Tag input
        let input = document.getElementById('tag-keyword');
        let extra = document.getElementById('extra-keyword');
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
        let tagifyExtra = new Tagify(extra, {
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
            $.get('{{route('ajax.get.country.list')}}', function (data) {
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
