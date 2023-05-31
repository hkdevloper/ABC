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
                        Add Location
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('add.multiple.location')}}" method="post" class="intro-y box p-5"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Featured</label>
                                <input type="checkbox" name="featured" value="true"
                                       class="input input--switch border pt-4">
                            </div>
                            <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Locations</label>
                                <textarea rows="10" name="locations" required class="input w-full border mt-2 flex-1"
                                          placeholder="e.g.:
USA;California;Anaheim
USA;California;Los Angeles;Hollywood
USA;California;Los Angeles;Angelino Heights
USA;California;San Bernardino
">{{old('description')}}</textarea>
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

@endsection
