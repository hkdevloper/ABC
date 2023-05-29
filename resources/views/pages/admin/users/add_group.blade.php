@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add user group
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('add.user.group')}}" method="post" class="intro-y box p-5">
                            @csrf
                            <div>
                                <label>Group</label>
                                <input name="group_name" type="text" class="input w-full border mt-2"
                                       placeholder="Input text">
                            </div>
                            <div class="mt-3">
                                <label>Roles</label>
                                <div class="mt-2">
                                    <select name="roles[]" id="roles" data-placeholder="Give Permission" required
                                            class="select2 w-full" multiple>
                                    </select>
                                </div>
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
            <script>
                @if(session()->has('msg'))
                showToast('{{ session()->get('type', 'info') }}', '{{ session()->get('msg') }}');
                @endif

                @if($errors->any())
                @foreach ($errors->all() as $error)
                showToast('error', '{{ $error }}');
                @endforeach
                @endif
            </script>
            {{-- Scripts for this page goes here --}}
            <script>
                let jsonData = {
                    "user_login": true,
                    "admin_email": true,
                    "admin_files": true,
                    "admin_login": true,
                    "admin_users": true,
                    "admin_claims": true,
                    "admin_export": true,
                    "admin_fields": true,
                    "admin_import": true,
                    "admin_content": true,
                    "admin_reviews": true,
                    "admin_listings": true,
                    "admin_messages": true,
                    "admin_products": true,
                    "admin_settings": true,
                    "admin_locations": true,
                    "admin_appearance": true,
                    "admin_categories": true
                };

                function createOptionsFromJSON(jsonData) {
                    var select = document.getElementById("roles");

                    for (var key in jsonData) {
                        if (jsonData.hasOwnProperty(key)) {
                            var option = document.createElement("option");
                            option.value = key;
                            option.text = key;

                            select.appendChild(option);
                        }
                    }
                }

                createOptionsFromJSON(jsonData);
            </script>
@endsection
