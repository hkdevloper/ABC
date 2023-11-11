<x-filament::modal id="Requirement" :close-by-clicking-away="false" width="3xl">
    <x-slot name="heading">
        Post Your Requirements
    </x-slot>

    {{-- Modal content --}}
    <form action="{{route('requirements.submit')}}" method="post" enctype="multipart/form-data" class="requirement-form">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div class="mb-4">
               <x-bladewind::input
                    type="text"
                    name="customer_name"
                    required="true"
                    show_error_inline="true"
                    placeholder="Name"
                    error-message="Please enter your name."
                    label="Enter Your Name"
                />
            </div>
            <div class="mb-4">
                <x-bladewind::input
                    type="text"
                    name="subject"
                    show_error_inline="true"
                    required="true"
                    placeholder="Subject"
                    error-message="Please enter your subject."
                    label="Enter Subject"
                />
            </div>
            <div class="mb-4">
                <x-bladewind::input
                    type="email"
                    name="email"
                    required="true"
                    placeholder="Email"
                    show_error_inline="true"
                    label="Enter Your Email"
                />
            </div>
            <div class="mb-4">
                <x-bladewind::input
                    type="text"
                    name="phone"
                    required="true"
                    placeholder="Phone"
                    show_error_inline="true"
                    error-message="Please enter your phone number."
                    label="Enter Your Phone Number"
                />
            </div>
            <div class="mb-4">
                <x-bladewind::input
                    type="text"
                    name="country"
                    placeholder="Country"
                    required="true"
                    show_error_inline="true"
                    error-message="Please enter your country name."
                    label="Enter Your Country Name"
                />
            </div>
            <div class="mb-4">
                <x-bladewind.filepicker
                    name="img-1"
                    class="w-1/3"
                    accepted-file-types="image/*"
                    placeholder="Upload Image"  />
                <x-bladewind.filepicker
                    name="img-2"
                    class="w-1/3"
                    accepted-file-types="image/*"
                    placeholder="Upload Image"  />
                <x-bladewind.filepicker
                    name="img-3"
                    class="w-1/3"
                    accepted-file-types="image/*"
                    placeholder="Upload Image"  />
            </div>
            <div class="mb-4">
                <x-bladewind::textarea
                    type="text"
                    name="description"
                    required="true"
                    placeholder="Description"
                    show_error_inline="true"
                    error-message="Please enter your description."
                    label="Enter Your Description"
                />
            </div>
        </div>
        <div class="flex justify-center mt-4">
            <x-bladewind.button
                name="btn-save"
                has_spinner="true"
                type="primary"
                can_submit="true"
                class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded-full text-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out">
                Submit
            </x-bladewind.button>
        </div>
    </form>
    <script>
        dom_el('.requirement-form').addEventListener('submit', function (e){
            e.preventDefault();
            if(validateForm('.requirement-form')){
                unhide('.btn-save .bw-spinner');
                this.submit();
            }
        });
    </script>
</x-filament::modal>

<x-filament::modal id="contact-us">
    <x-slot name="heading">
        Contact Us
    </x-slot>
    {{-- Modal content --}}
</x-filament::modal>

<x-filament::modal id="category">
    <x-slot name="heading">
        Categories
    </x-slot>
    @php
    $category = \App\Models\Category::where('type', session()->get('menu'))->get();
    @endphp
    @foreach($category as $item)
        <x-bladewind.list-view>
            <x-bladewind.list-item>
                <div class="ml-3">
                    <a href="{{route('company', ['category'=>$item->name])}}" class="text-sm font-medium text-slate-900">
                        {{$item->name}}
                    </a>
                </div>
            </x-bladewind.list-item>
        </x-bladewind.list-view>
    @endforeach
</x-filament::modal>
