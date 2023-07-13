
@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Edit {{$type}} Package
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <form action="{{route('edit.membership', [$package->id, "type"=> $type])}}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="{{$type}}">
                        <div>
                            <label>Name</label>
                            <input required type="text" name="name" class="input w-full border mt-2" placeholder="Name" value="{{$package->name}}">
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea required name="description" id="" cols="30" rows="10" class="input w-full border mt-2" placeholder="Description">{{$package->description}}</textarea>
                        </div>
                        <div>
                            <label>Listing Position</label>
                            <input required type="number" name="listing_position" class="input w-full border mt-2" placeholder="Listing Position" value="{{$package->listing_position}}">
                        </div>
                        <div>
                            <label>Extra Categories Limit</label>
                            <input required type="number" name="extra_categories_limit" class="input w-full border mt-2" placeholder="Extra Categories Limit" value="{{$package->extra_category_limit}}">
                        </div>
                        <div>
                            <label>Title Size Limit</label>
                            <input required type="number" name="title_size_limit" class="input w-full border mt-2" placeholder="Title Size Limit" value="{{$package->title_size_limit}}">
                        </div>
                        <div>
                            <label>Short Description Size Limit</label>
                            <input required type="number" name="short_description_size_limit" class="input w-full border mt-2" placeholder="Short Description Size Limit" value="{{$package->short_description_limit}}">
                        </div>
                        <div>
                            <label>Description Size Limit</label>
                            <input required type="number" name="description_size_limit" class="input w-full border mt-2" placeholder="Description Size Limit" value="{{$package->description_size_limit}}">
                        </div>
                        <div>
                            <label>Gallery Photos Limit</label>
                            <input required type="number" name="gallery_photos_limit" class="input w-full border mt-2" placeholder="Gallery Photos Limit" value="{{$package->gallery_photos_limit}}">
                        </div>
                        <div>
                            <label>Features</label>
                            <div style="display: flex; justify-content: space-between">
                                <div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="hidden" name="hidden" value="true" {{$package->hidden ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="hidden">Hidden</label>
                                    </div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="featured" name="featured" value="true" {{$package->featured ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="featured">Featured</label>
                                    </div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="featured_listing" name="featured_listing" value="true" {{$package->featured_listings ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="featured_listing">Featured Listings</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="show_address" value="true" name="show_address" {{$package->show_address ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="show_address">Show Address</label>
                                    </div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="show_map" value="true" name="show_map" {{$package->show_map ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="show_map">Show Map</label>
                                    </div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="allow_message" name="allow_message" value="true" {{$package->allow_messages ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="allow_message">Allow Messaging</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="enable_review" name="enable_review" value="true" {{$package->enable_review ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="enable_review">Enable Reviews</label>
                                    </div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="enable_seo" name="enable_seo" value="true" {{$package->enable_seo ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="enable_seo">Enable SEO</label>
                                    </div>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="require_backlink" name="require_backlink" value="true" {{$package->require_backlink ? "checked" : ""}}>
                                        <label class="cursor-pointer select-none" for="require_backlink">Require Backlink</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('page-scripts')
    {{-- Scripts for this page goes here --}}

@endsection
