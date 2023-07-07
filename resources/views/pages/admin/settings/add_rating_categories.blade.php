@extends('main')

@section("content")
    {{-- Main Content goes Here --}}
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add New Rating Category
                    </h2>
                </div>
                <div class="box p-2 mt-5">
                    <form action="{{route('settings.rating.categories.add')}}" method="post" class="intro-y box p-5"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Name</label>
                            <input type="text" class="input w-full border mt-2 flex-1" name="name" placeholder="category name">
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
@endsection
