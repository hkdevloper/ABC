@extends('layouts.main-admin')

@section("head")
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
                        Edit {{$type}} Category
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <form action="{{route('edit.category', ['type' => $type, $category->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div style="display: flex">
                            <div style="margin-right: 50px">
                                <label>Published</label>
                                <br>
                                <input type="checkbox" @if($category->is_active) checked
                                       @endif class="input w-full input--switch border" name="is_active">
                            </div>
                            <div>
                                <label>Featured</label>
                                <br>
                                <input type="checkbox" @if($category->is_featured) checked
                                       @endif class="input w-full input--switch border" name="is_featured">
                            </div>
                        </div>
                        <div>
                            <label>Parent Category</label>
                            <select class="select2 w-full" name="parent_id">
                                <option value="0" selected>None</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Category Name</label>
                            <input id="name" value="{{$category->name}}" type="text" class="input w-full border mt-2"
                                   placeholder="Enter Category Name here" name="category_name">
                        </div>
                        <div>
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                            <input name="slug" type="text" class="input w-full border mt-2 flex-1" required
                                   value="{{$category->slug}}"
                                   placeholder="AAA>>bb>>c" id="slug">
                        </div>
                        <div class="mt-3">
                            <label>Category Summary</label>
                            <input type="text" class="input w-full border mt-2" name="summary"
                                   value="{{$category->summary}}"
                                   placeholder="Enter Category Summary here">
                        </div>
                        <div class="mt-3">
                            <label>Category Description</label>
                            <textarea id="editor" class="input w-full border mt-2" name="description"
                                      placeholder="Enter Category Description here">{{$category->description}}</textarea>
                        </div>
                        <div class="mt-3">
                            <label>Category Icon</label>
                            <i style="font-size: 25px" id="IconPreview"
                               class="input border mt-2 {{$category->icon}}"></i>
                            <button type="button" id="GetIconPicker" data-iconpicker-input="input#IconInput"
                                    data-iconpicker-preview="i#IconPreview" class="note-btn">Select Icon
                            </button>
                            <input type="hidden" name="icon" value="{{$category->icon}}" id="IconInput"
                                   class="input w-full border mt-2">
                        </div>
                        <div class="mt-3">
                            <label>Category Image</label>
                            <input type="file" id="media_file" class="input w-full border mt-2" name="file"
                                   placeholder="Enter Category Image here">
                        </div>
                        <input name="media" id="media" type="hidden"/>
                        <div>
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Title</label>
                            <input name="meta_title" type="text" class="input w-full border mt-2 flex-1" required
                                   placeholder="" value="{{$seo->title}}">
                        </div>
                        <div>
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Keywords</label>
                            <input name="meta_keywords" type="text" class="input w-full border mt-2 flex-1" required
                                   value="{{$seo->meta_keywords}}" id="tag-keyword">
                        </div>
                        <div>
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Description</label>
                            <input name="meta_description" type="text" class="input w-full border mt-2 flex-1"
                                   required
                                   placeholder="" value="{{$seo->meta_description}}">
                        </div>
                        <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>
                    </form>
                </div>
                {{-- Main Content End --}}
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
                        load: (source, load, error, progress, abort, headers) => {
                            let myRequest = new Request(source);
                            fetch(myRequest).then(function (response) {
                                response.blob().then(function (myBlob) {
                                    load(myBlob);
                                });
                            });
                        },
                        fetch: (url, load, error, progress, abort, headers) => {
                            let myRequest = new Request(url);
                            fetch(myRequest).then(function (response) {
                                response.blob().then(function (myBlob) {
                                    load(myBlob);
                                });
                            });
                        }
                    },


                });
                FilePond.parse(document.body);
            </script>
            {{--    TagiFY/Slug--}}
            <script>
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

@endsection
