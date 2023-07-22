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
                        Edit Company
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <form action="{{route('edit.company', [$company->id])}}" method="post" enctype="multipart/form-data"
                      class="intro-y datatable-wrapper box p-5 mt-5">
                    @csrf
                    <div style="display: flex">
                        <div style="margin-right: 50px">
                            <label>Approved</label>
                            <br>
                            <input type="checkbox" @if($company->approved || old('approved') == 'on') checked
                                   @endif class="input w-full input--switch border" name="approved">
                        </div>
                        <div>
                            <label>Claimed</label>
                            <br>
                            <input type="checkbox" class="input w-full input--switch border" name="claimed"
                                   @if($company->claimed || old('claimed') == 'on') checked @endif >
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Select User</label>
                        <select name="user" required class="select2 input w-full border mt-2">
                            <option selected>Select user</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                        @if($company->user_id == $user->id) selected @endif>{{$user->first_name}}
                                    &nbsp;{{$user->last_name}}
                                    &nbsp;[Id: {{$user->id}}]
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Category</label>
                        <select name="category" required class="select2 input w-full border mt-2">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($company->category_id == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Company Logo</label>
                        <input type="file" id="media_file" class="input w-full border mt-2"
                               placeholder="Enter Category Image here" name="file">
                    </div>
                    <input name="logo" id="media" type="hidden" value="{{old('logo')}}"/>
                    <input name="old_logo" type="hidden" value="{{$company->media_logo_id}}"/>
                    <div class="mt-3">
                        <label>Company Name</label>
                        <input id="name" type="text" class="input w-full border mt-2" required autofocus
                               value="@if($company->name){{$company->name}}@elseif(old('name')){{old('name')}}@else''@endif"
                               placeholder="Enter Category Name here" name="name">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                        <input name="slug" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder="AAA>>bb>>c" id="slug"
                               value="@if($company->slug){{$company->slug}}@elseif(old('slug')){{old('slug')}}@else''@endif">
                    </div>
                    <div class="mt-3">
                        <label>Company Description</label>
                        <textarea id="editor" class="input w-full border mt-2" name="description"
                                  placeholder="Enter Category Description here">@if($company->description)
                                {{$company->description}}
                            @elseif(old('description'))
                                {{old('description')}}
                            @else
                                ''
                            @endif</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Extra Things</label>
                        <input name="extra" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder=", (comma seperated values)" id="extra-keyword"
                               value="@if($company->extra_things){{$company->extra_things}}
                            @elseif(old('extra')){{old('extra')}}
                            @else''@endif">
                    </div>
                    <div class="mt-3">
                        <label>Company Gallery</label>
                        <input type="file" id="media_file_gallery" class="input w-full border mt-2" multiple
                               placeholder="Enter Category Image here" name="file">
                    </div>
                    <input name="gallery[]" id="gallery" type="hidden" value="@if($company->gallery){{$company->gallery}}
                            @elseif(old('gallery')){{old('gallery')}}
                            @else''@endif"/>
                    <input name="old_gallery[]" type="hidden" value="{{$company->gallery}}"/>
                    <div class="mt-3">
                        <label>Phone Number</label>
                        <input type="text" class="input w-full border mt-2" name="phone" value="@if($company->phone){{$company->phone}}
                            @elseif(old('phone')){{old('phone')}}
                            @else''@endif"
                               placeholder="Enter Phone Number here">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Email</label>
                        <input name="email" type="email" class="input w-full border mt-2 flex-1" required
                               placeholder="john@mail.com" value="@if($company->email){{$company->email}}
                            @elseif(old('email')){{old('email')}}
                            @else''@endif">
                    </div>
                    <div class="mt-3">
                        <label>Website</label>
                        <input type="text" class="input w-full border mt-2" name="website" value="@if($company->website){{$company->website}}
                            @elseif(old('website')){{old('website')}}
                            @else''@endif"
                               placeholder="Enter Website here">
                    </div>
                    <div class="mt-3">
                        <label>Facebook</label>
                        <input type="text" class="input w-full border mt-2" name="facebook" value="@if($company->facebook){{$company->facebook}}
                            @elseif(old('facebook')){{old('facebook')}}
                            @else''@endif"
                               placeholder="Enter Facebook here">
                    </div>
                    <div class="mt-3">
                        <label>Twitter</label>
                        <input type="text" class="input w-full border mt-2" name="twitter" value="@if($company->twitter){{$company->twitter}}
                            @elseif(old('twitter')){{old('twitter')}}
                            @else''@endif"
                               placeholder="Enter Twitter here">
                    </div>
                    <div class="mt-3">
                        <label>Instagram</label>
                        <input type="text" class="input w-full border mt-2" name="instagram"
                               value="@if($company->instagram){{$company->instagram}}
                            @elseif(old('instagram')){{old('instagram')}}
                            @else''@endif"
                               placeholder="Enter Instagram here">
                    </div>
                    <div class="mt-3">
                        <label>Linkedin</label>
                        <input type="text" class="input w-full border mt-2" name="linkedin" value="@if($company->linkdin){{$company->linkdin}}
                            @elseif(old('linkedin')){{old('linkedin')}}
                            @else''@endif"
                               placeholder="Enter Linkedin here">
                    </div>
                    <div class="mt-3">
                        <label>Youtube</label>
                        <input type="text" class="input w-full border mt-2" name="youtube" value="@if($company->youtube){{$company->youtube}}
                            @elseif(old('youtube')){{old('youtube')}}
                            @else''@endif"
                               placeholder="Enter Youtube here">
                    </div>
                    <div class="mt-3">
                        <label>Address</label>
                        <input type="text" class="input w-full border mt-2" name="address" value="@if($company->address){{$company->address}}
                            @elseif(old('address')){{old('address')}}
                            @else''@endif"
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
                        <input type="text" class="input w-full border mt-2" name="zip_code" value="@if($company->zip_code){{$company->zip_code}}
                            @elseif(old('zip_code')){{old('zip_code')}}
                            @else''@endif"
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
                               placeholder="" id="longitude" value="@if($company->longitude){{$company->longitude}}
                            @elseif(old('longitude')){{old('longitude')}}
                            @else''@endif">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Latitude</label>
                        <input name="latitude" type="text" class="input w-full border mt-2 flex-1" required
                               readonly
                               placeholder="" id="latitude" value="@if($company->latitude){{$company->latitude}}
                            @elseif(old('latitude')){{old('latitude')}}
                            @else''@endif">
                    </div>


                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Title</label>
                        <input name="meta_title" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder="" value="@if($seo->title){{$seo->title}}
                            @elseif(old('meta_title')){{old('meta_title')}}
                            @else''@endif">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Keywords</label>
                        <input name="meta_keywords" type="text" class="input w-full border mt-2 flex-1" required
                               placeholder=", (comma seperated values)" id="tag-keyword"
                               value="@if($seo->meta_keywords){{$seo->meta_keywords}}
                            @elseif(old('meta_keywords')){{old('meta_keywords')}}
                            @else''@endif">
                    </div>
                    <div class="mt-3">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Description</label>
                        <input name="meta_description" type="text" class="input w-full border mt-2 flex-1"
                               required
                               placeholder="" value="@if($seo->meta_description){{$seo->meta_description}}
                            @elseif(old('meta_description')){{old('meta_description')}}
                            @else''@endif">
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

@endsection

