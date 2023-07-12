@extends('main')

@section("content")
    {{-- Main Content goes Here --}}
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Edit Payment Gateways - {{$gateway->name}}
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('settings.edit.payment.gateways', ['id' => $gateway->id])}}" method="post"
                              class="intro-y box p-5">
                            @csrf
                            <div>
                                <label>Active</label>
                                <input type="checkbox" name="is_active" value="true"
                                       @if($gateway->is_active)
                                           {!! "checked" !!}
                                       @endif class="input input--switch border">
                            </div>
                            <div class="mt-3">
                                <label>Name</label>
                                <input name="name" type="text" class="input w-full border mt-2"
                                       value="{{$gateway->name}}">
                            </div>
                            <div class="mt-3">
                                <label>Description</label>
                                <textarea name="description" class="input w-full border mt-2"
                                          placeholder="Description">{{$gateway->description}}</textarea>
                            </div>
                            <hr>

                            @foreach($gateway->settings as $data => $value)
                                <div class="mt-3">
                                    @if($data === 'instructions')
                                        <label>{{$data}}</label>
                                        <textarea data-feature="all" class="summernote"
                                                  name="{{$data}}">{{$value}}</textarea>
                                    @elseif($data === 'sandbox_mode')
                                        <div>

                                            <label>{{$data}}</label>
                                            <input type="checkbox" name="{{$data}}" value="true"
                                                   @if($value)
                                                       {!! "checked" !!}
                                                   @endif class="input input--switch border mx-2 mt-2">
                                        </div>
                                    @else
                                        <label>{{$data}}</label>
                                        <input name="{{$data}}" type="text" class="input w-full border mt-2"
                                               value="{{$value}}">
                                    @endif
                                </div>
                            @endforeach

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
                $(document).ready(function () {
                    // Attach an event listener to the checkboxes
                    $('.input--switch').on('change', function () {
                        // Get the checkbox value
                        var checkboxValue = $(this).is(':checked') ? 'checked' : 'unchecked';

                        // Get the data-id value of the checked checkbox
                        var checkboxId = $(this).data('id');

                        // Make the AJAX POST request
                        $.ajax({
                            url: '{{route('ajax.payment.gateway.status')}}',  // Replace with your endpoint URL
                            method: 'POST',
                            data: {gateway_id: checkboxId, status: checkboxValue},  // Additional data to send
                            success: function (response) {
                                // Handle the response from the server
                                console.log(response);
                                if (response.status === 'success') {
                                    showToast('success', 'status updated successfully');
                                } else {
                                    showToast('error', 'Something went wrong');
                                }
                            },
                            error: function (xhr, status, error) {
                                // Handle any errors that occurred during the request
                                console.error(error);
                            }
                        });
                    });
                });
            </script>
@endsection
