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
                        Add Event
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <form action="{{route('add.event')}}" method="post" enctype="multipart/form-data"
                      class="intro-y datatable-wrapper box p-5 mt-5">
                    @csrf
                    <div style="display: flex">
                        <div style="margin-right: 50px">
                            <label>Approved</label>
                            <br>
                            <input type="checkbox" checked class="input w-full input--switch border" name="is_active">
                        </div>
                        <div style="margin-right: 50px">
                            <label>Claimed</label>
                            <br>
                            <input type="checkbox" class="input w-full input--switch border" name="is_claimed">
                        </div>
                        <div style="margin-right: 50px">
                            <label>Allow RSVPs</label>
                            <br>
                            <input type="checkbox" class="input w-full input--switch border" name="is_rsvp">
                        </div>
                        <div>
                            <label>Featured</label>
                            <br>
                            <input type="checkbox" class="input w-full input--switch border" name="is_featured">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Select User</label>
                        <select name="user" required class="select2 input w-full border mt-2">
                            <option>Select user</option>
                            @foreach($users as $user)
                                <option
                                    {{$user->id == old('user') ? "selected" : ""}} value="{{$user->id}}">{{$user->first_name}}
                                    &nbsp;{{$user->last_name}}
                                    &nbsp;[Id: {{$user->id}}]
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Category</label>
                        <select name="category" required class="select2 input w-full border mt-2">
                            <option>Select Category</option>
                            @foreach($categories as $category)
                                <option
                                    {{$category->id == old('category') ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label>Event Title</label>
                        <input id="name" type="text" class="input w-full border mt-2" required autofocus
                               autocomplete="off" value="{{old('title')}}"
                               placeholder="Enter event title here" name="title">
                    </div>
                    <div class="mt-3">
                        <label>Event Start Date & Time</label>
                        <input type="datetime-local" class="input w-full border mt-2" name="start" required
                               value="{{old('start')}}"
                               placeholder="Enter Start Date & Time here">
                    </div>
                    <div class="mt-3">
                        <label>Event End Date & Time</label>
                        <input type="datetime-local" class="input w-full border mt-2" name="end" required
                               value="{{old('end')}}"
                               placeholder="Enter End Date & Time here">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                        <input name="slug" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder="AAA>>bb>>c" id="slug" value="{{old('slug')}}">
                    </div>
                    <div class="mt-3">
                        <label>Description</label>
                        <textarea id="editor" class="input w-full border mt-2" name="description"
                                  placeholder="Enter Description here">{{old('description')}}</textarea>
                    </div>
                    <div class="mt-3">
                        <label>Address</label>
                        <input type="text" class="input w-full border mt-2" name="address"
                               value="{{old('address') ? old('address') : ''}}"
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
                               value="{{old('zip_code') ? old('zip_code') : ''}}"
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
                               value="{{old('longitude') ? old('longitude') : ''}}">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Latitude</label>
                        <input name="latitude" type="text" class="input w-full border mt-2 flex-1" required
                               readonly
                               placeholder="" id="latitude" value="{{old('latitude') ? old('latitude'): ''}}">
                    </div>

                    <div class="mt-3">
                        <label>Website</label>
                        <input type="url" class="input w-full border mt-2" name="website" value="{{old('website')}}"
                               placeholder="Enter Website here">
                    </div>
                    <div class="mt-3">
                        <label>Event Thumbnail</label>
                        <input type="file" id="media_file" class="input w-full border mt-2" name="file" required>
                    </div>
                    <input name="thumbnail" id="media" type="hidden" required/>
                    <div class="mt-3">
                        <label>Event Galley</label>
                        <input type="file" id="media_file_gallery" class="input w-full border mt-2" multiple required
                               name="file">
                    </div>
                    <input name="gallery[]" id="gallery" type="hidden" required/>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Title</label>
                        <input name="meta_title" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder="" value="{{$seo->title ? $seo->title : old('meta_title')}}">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Keywords</label>
                        <input name="meta_keywords" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder=", (comma seperated values)" id="tag-keyword"
                               value="{{$seo->meta_keywords ? $seo->meta_keywords : old('meta_keywords')}}">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Description</label>
                        <input name="meta_description" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder=""
                               value="{{$seo->meta_description ? $seo->meta_description : old('meta_description')}}">
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
@endsection
