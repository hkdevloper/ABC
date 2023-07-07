@extends('main')

@section('head')
    <style>
        .note-editor.note-frame {
            width: -webkit-fill-available !important;
        }
    </style>
@endsection

@section("content")
    {{-- Main Content goes Here --}}
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add New Listing Type
                    </h2>
                </div>
                <div class="box p-2 mt-5">
                    <form action="{{route('listing.types.add')}}" method="post" class="intro-y box p-5">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Published</label>
                            <input type="checkbox" name="published" class="input input--switch border"
                                   @if(old('published')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Listing Type</label>
                            <select data-hide-search="true" class="select2 w-full" name="listing_type">
                                @if(old('listing_type'))
                                    <option value="{{old('listing_type')}}"
                                            selected>{{ucwords(str_replace("_", " ", old('listing_type')))}}</option>
                                @endif
                                <option value="local_business" selected>Local Business</option>
                                <option value="classified">Classified</option>
                                <option value="event">Event</option>
                                <option value="job">Job</option>
                                <option value="offer">Offer</option>
                                <option value="place">Place</option>
                                <option value="blog">Blog</option>
                            </select>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Name (Singular)</label>
                            <input type="text" class="input w-full border mt-2 flex-1" name="name_singular"
                                   value="{{old('name_singular')}}" id="slug" required>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Name (Plural)</label>
                            <input type="text" class="input w-full border mt-2 flex-1" name="name_plural"
                                   value="{{old('name_plural')}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Slug</label>
                            <input type="text" class="input w-full border mt-2 flex-1" name="slug"
                                   value="{{old('slug')}}" id="slugvalue" required>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Icon</label>
                            <div class="d-inline-flex align-items-center">
                                <span class="fa-3x py-2 px-3 border rounded text-secondary"
                                      style="min-width: 5rem; min-height: 6rem;">
                                    <i id="iconpicker-preview-icon" class="{{old('icon')}}"></i>
                                </span>
                            </div>
                            <input id="icon" class="form-control" type="hidden" name="icon" value="{{old('icon')}}">
                            <button type="button" class="GetIconPicker button w-24 bg-theme-1 text-white mx-2"
                                    id="GetIconPicker" data-iconpicker-input="input#icon"
                                    data-iconpicker-preview="i#iconpicker-preview-icon">Select Icon
                            </button>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Enable Locations</label>
                            <input type="checkbox" class="input input--switch border" name="location"
                                   @if(old('location')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Enable Reviews</label>
                            <input type="checkbox" class="input input--switch border" name="review"
                                   @if(old('review')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center  m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Per-user Listing Limit</label>
                            <input type="number" class="input w-full border mt-2 flex-1" name="per_user_limit"
                                   value="{{old('per_user_limit')}}" placeholder="0">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Parent Types</label>
                            <select data-hide-search="true" class="select2 w-full" name="parent_type">
                                @if(old('parent_type'))
                                    <option value="{{old('parent_type')}}"
                                            selected>{{ucwords(str_replace("_", " ", old('parent_type')))}}</option>
                                @endif
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name_singular}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Linked Rating Categories</label>
                            <select data-hide-search="true" class="select2 w-full" name="rating_category">
                                @if(old('rating_category'))
                                    <option value="{{old('rating_category')}}"
                                            selected>{{ucwords(str_replace("_", " ", old('rating_category')))}}</option>
                                @endif
                                @foreach($rating_categories as $rating_category)
                                    <option value="{{$rating_category->id}}">{{$rating_category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center m-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Address Formate</label>
                            <textarea data-feature="basic" class="summernote input w-full border mt-2 flex-1"
                                      name="address_format">
                                @if(old('address_format'))
                                    {{old('address_format')}}
                                @else
                                    <span itemprop="streetAddress">{address}</span>
                                    <span itemprop="addressLocality">{location_3}</span>, <span
                                    itemprop="addressRegion">{location_2}</span> <span
                                    itemprop="postalCode">{zip}</span> <span
                                    itemprop="addressCountry">{location_1}</span>
                                @endif
                            </textarea>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Approve New Listing</label>
                            <input type="checkbox" class="input input--switch border" name="approve_new_listing"
                                   @if(old('approve_new_listing')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Approve Updates</label>
                            <input type="checkbox" class="input input--switch border" name="approve_updates"
                                   @if(old('approve_updates')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Approve Reviews</label>
                            <input type="checkbox" class="input input--switch border" name="approve_reviews"
                                   @if(old('approve_reviews')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">approve Reviews Comments</label>
                            <input type="checkbox" class="input input--switch border" name="approve_review_comments"
                                   @if(old('approve_review_comments')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Approve Messages</label>
                            <input type="checkbox" class="input input--switch border" name="approve_messages"
                                   @if(old('approve_messages')) checked @endif>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Approve Message Replies</label>
                            <input type="checkbox" class="input input--switch border" name="approve_message_replies"
                                   @if(old('approve_message_replies')) checked @endif>
                        </div>
                        <div class="text-right mt-5">
                            <a href="{{url()->previous()}}" class="button w-24 border text-gray-700 mr-1">Cancel</a>
                            <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

        @section('page-scripts')
            {{-- Scripts for this page goes here --}}
            <script>
                @if(session()->has('msg'))
                showToast('{{ session()->get('types', 'info') }}', '{{ session()->get('msg') }}');
                @endif

                @if($errors->any())
                @foreach ($errors->all() as $error)
                showToast('error', '{{ $error }}');
                @endforeach
                @endif
            </script>

        <script>
            // generate slug
            $('#slug').on('input', function () {
                var name = $(this).val();
                $('#slugvalue').val(slugify(name));
            });

            // slugify
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                    .replace(/\-\-+/g, '-') // Replace multiple - with single -
                    .replace(/^-+/, '') // Trim - from start of text
                    .replace(/-+$/, ''); // Trim - from end of text
            }
        </script>

            <script>
                $(document).ready(function () {
                    IconPicker.Init({
                        jsonUrl: '{{url('dist/json/iconpicker.json')}}',
                        searchPlaceholder: 'Search icons',
                        showAllButton: 'Show All Icons',
                        cancelButton: 'Cancel',
                        noResultsFound: 'No results',
                        borderRadius: '0px',
                    });

                    IconPicker.Run('#GetIconPicker');

                    $('#iconpicker-icon-drop').on('click', function (event) {
                        $($(this).data('iconpicker-preview')).attr('class', '');
                        $('#icon').val('');
                    });
                });
            </script>
@endsection
