@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Edit Users Group
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('edit.user.group',['id' => $id])}}" method="post" class="intro-y box p-5">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <div>
                                <label>Group</label>
                                <input name="group_name" type="text" class="input w-full border mt-2"
                                       placeholder="{{$name}}">
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
            {{-- Scripts for this page goes here --}}
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
            <script>
                let jsonData = {!! $permissions !!}; // This is the data from the database

                var select = document.getElementById("roles");

                for (var key in jsonData) {
                    if (jsonData.hasOwnProperty(key)) {
                        var option = document.createElement("option");
                        option.value = key;
                        option.text = key;

                        // If the key is in the array of permissions, then select it
                        if (jsonData[key] === true) {
                            option.selected = true;
                        }

                        select.appendChild(option);
                    }
                }
            </script>
@endsection
