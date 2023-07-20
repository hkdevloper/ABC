@extends('main')
@section("head")
    {{--    <link rel="stylesheet" href="{{url("/")}}/dist/css/leaflet.css">--}}
    {{--    <script src="{{url("/")}}/dist/js/leaflet.js"></script>--}}
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
                        Add Product
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <div style="display: flex">
                        <div style="margin-right: 50px">
                            <label>Approved</label>
                            <br>
                            <input type="checkbox" checked class="input w-full input--switch border" name="is_active">
                        </div>
                        <div>
                            <label>Claimed</label>
                            <br>
                            <input type="checkbox" class="input w-full input--switch border" name="is_featured">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Select User</label>
                        <select class="select2 input w-full border mt-2">
                            <option value="1">Select user</option>
                            <option value="2">User 1</option>
                            <option value="3">User 2</option>
                            <option value="4">User 3</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Category</label>
                        <select class="select2 input w-full border mt-2">
                            <option value="1">Select Category</option>
                            <option value="2">Category 1</option>
                            <option value="3">Category 2</option>
                            <option value="4">Category 3</option>
                            <option value="5">Category 4</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Product Name</label>
                        <input id="name" type="text" class="input w-full border mt-2"
                               placeholder="Enter Category Name here" name="category_name">
                    </div>
                    <div class="mt-3">
                        <label>SKU</label>
                        <input id="sku" type="text" class="input w-full border mt-2"
                               placeholder="Enter SKU Code here" name="sku">
                    </div>
                    <div class="mt-3">
                        <label>Price</label>
                        <input id="price" type="text" class="input w-full border mt-2"
                               placeholder="Enter Price here" name="price">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                        <input name="slug" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder="AAA>>bb>>c" id="slug" value="{{old('slug')}}">
                    </div>
                    <div class="mt-3">
                        <label>Summary</label>
                        <input type="text" class="input w-full border mt-2" name="summary"
                               placeholder="Enter Category Summary here">
                    </div>
                    <div class="mt-3">
                        <label>Description</label>
                        <textarea id="editor" class="input w-full border mt-2" name="description"
                                  placeholder="Enter Category Description here"></textarea>
                    </div>
                    <div class="mt-3">
                        <label>Condition</label>
                        <select class="select2 input w-full border mt-2">
                            <option value="1">Select Condition</option>
                            <option value="new">New</option>
                            <option value="used">Used</option>
                            <option value="refurbished">Refurbished</option>
                            <option value="damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Brand</label>
                        <input type="text" class="input w-full border mt-2" name="brand"
                               placeholder="Enter Brand here">
                    </div>
                    <div class="mt-3">
                        <label>Model</label>
                        <input type="text" class="input w-full border mt-2" name="model"
                               placeholder="Enter Model here">
                    </div>
                    <div class="mt-3">
                        <label>Website</label>
                        <input type="text" class="input w-full border mt-2" name="website"
                               placeholder="Enter Website here">
                    </div>
                    <div class="mt-3">
                        <label>Product Thumbnail</label>
                        <input type="file" id="media_file" class="input w-full border mt-2" name="file">
                    </div>
                    <input name="media" id="media" type="hidden"/>
                    <div class="mt-3">
                        <label>Product Galley</label>
                        <input type="file" id="media_file_gallery" class="input w-full border mt-2" multiple
                               name="file">
                    </div>
                    <input name="gallery[]" id="gallery" type="hidden"/>
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
                    <button type="button" class="button bg-theme-1 text-white mt-5">Submit</button>
                </div>
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

