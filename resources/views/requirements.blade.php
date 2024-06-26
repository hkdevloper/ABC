@extends('layouts.user')

@section('head')

@endsection
@section('content')
    <section class="container mx-auto w-full my-10">
        <h1 class="text-3xl font-bold text-center">Post Your Business Requirements</h1>
        <p class="text-center text-gray-600">Navigating the vast landscape of business opportunities can be challenging. Whether you're seeking suppliers, service providers, or business insights, we're here to guide you. Share your requirements, and let us connect you to the resources that propel your business forward.</p>
        <p class="text-center text-gray-600">Fields marked with * are mandatory.</p>
        <br>
        <hr>
        <br>
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
                <!-- Checkbox to upload File if user select -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="upload_file">
                        Upload File
                        <input type="checkbox" id="upload_file" name="upload_file" value="1" class=" mx-5 bw-checkbox">
                    </label>
                </div>
                <div class="mb-4 hidden" id="file">
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
            <div class="text-center mt-4">
                <p class="text-gray-600 text-xs">
                    By submitting this form, you agree to our <a href="{{ route('policy') }}"
                                                                 class="text-blue-500 hover:text-blue-700">Privacy
                        Policy</a> and <a href="{{ route('tos') }}"
                                          class="text-blue-500 hover:text-blue-700">Terms of Service</a>.
                </p>
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
            const file = document.getElementById('file');
            const upload_file = document.getElementById('upload_file');
            upload_file.addEventListener('change', function(){
                if(this.checked){
                    file.classList.remove('hidden');
                }else{
                    file.classList.add('hidden');
                }
            });
        </script>
    </section>
@endsection
