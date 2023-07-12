@extends('main')

@section("content")
    {{-- Main Content goes Here --}}
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Manage Tax Rates
                    </h2>
                    <div class="flex ml-auto">
                        <a href="{{route('settings.tax.rates.add')}}"
                           class="ml-auto note-btn flex text-theme-1 dark:text-theme-10 mx-1">
                            Add New Rate
                        </a>
                    </div>
                </div>
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Rate (%)</th>
                            <th class="border-b-2 whitespace-no-wrap">Compound Tax</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rates as $data)
                            <tr>
                                <td class="border-b">{{$data->id}}</td>
                                <td class="border-b">{{$data->name}}</td>
                                <td class="border-b">{{$data->rate}}</td>
                                <td class="border-b">
                                    <div class="mt-3">
                                        <div class="mt-2">
                                            <input data-id="{{$data->id}}" type="checkbox"
                                                   @if($data->compound)
                                                       {!! "checked" !!}
                                                   @endif class="input input--switch border">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                           href="{{route('settings.tax.rates.edit', ['id'=> $data->id])}}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6"
                                           onclick="confirm('Are you sure?') ? window.location.replace('{{route('settings.tax.rates.delete', ['id'=> $data->id])}}') : ''"
                                           href="javascript:">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1" onclick=""></i> Delete
                                        </a>
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
                            url: '{{route('ajax.tax.rate.compound')}}',  // Replace with your endpoint URL
                            method: 'POST',
                            data: {status: checkboxValue, tax_rate_id: checkboxId},  // Additional data to send
                            success: function (response) {
                                // Handle the response from the server
                                if (response.status === 'success') {
                                    showToast('success', 'status updated successfully');
                                } else {
                                    showToast('error', 'Something went wrong');
                                }
                            },
                            error: function (xhr, status, error) {
                                // Handle any errors that occurred during the request
                                showToast('error', 'Something went wrong');
                            }
                        });
                    });
                });
            </script>
@endsection
