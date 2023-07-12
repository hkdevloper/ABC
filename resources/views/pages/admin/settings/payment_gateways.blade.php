@extends('main')

@section("content")
    {{-- Main Content goes Here --}}
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Manage Payment Gateways
                    </h2>
                </div>
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Active</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gateways as $data)
                            <tr>
                                <td class="border-b">{{$data->id}}</td>
                                <td class="border-b">{{$data->name}}</td>
                                <td class="border-b">
                                    <div class="mt-3">
                                        <div class="mt-2">
                                            <input data-id="{{$data->id}}" type="checkbox"
                                                   @if($data->is_active)
                                                       {!! "checked" !!}
                                                   @endif class="input input--switch border">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                           href="{{route('settings.edit.payment.gateways', ['id'=> $data->id])}}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
