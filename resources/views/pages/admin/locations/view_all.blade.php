@extends('layouts.main-admin')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Users
                    </h2>
                    <div class="flex ml-auto">
                        <a href="{{route('add.location')}}"
                           class="ml-auto note-btn flex text-theme-1 dark:text-theme-10 mx-1">
                            Add New Location
                        </a>
                        <a href="{{route('add.multiple.location')}}"
                           class="ml-auto note-btn flex text-theme-1 dark:text-theme-10 mx-1">
                            Add Multiple Location
                        </a>
                    </div>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">Locations</th>
                            <th class="border-b-2 whitespace-no-wrap">Slug</th>
                            <th class="border-b-2 whitespace-no-wrap">Views</th>
                            <th class="border-b-2 whitespace-no-wrap">Featured</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $data)
                            <tr>
                                <td class="border-b">{{$data->id}}</td>
                                <td class="border-b">{{$data->name}}</td>
                                <td class="border-b">{{$data->slug}}</td>
                                <td class="border-b">00</td>
                                <td class="border-b">
                                    <div class="mt-3">
                                        <div class="mt-2">
                                            <input type="checkbox" @if($data->featured) checked @endif data-id="{{$data->id}}" class="input input--switch border">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        @if($data->has_children)
                                            <a class="flex items-center mr-3"
                                               href="{{route('locations')}}?parent_id={{$data->id}}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Sub locations
                                            </a>
                                        @else
                                            <a class="flex items-center mr-3"
                                               href="{{route('edit.location', ['id'=>$data->id])}}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        @endif
                                        <a class="flex items-center text-theme-6"
                                           onclick="confirm('Are you sure?') ? window.location.replace('{{route('delete.location', ['id'=> $data->id])}}') : ''"
                                           href="javascript:"> <i
                                                data-feather="trash-2" class="w-4 h-4 mr-1" onclick=""></i> Delete
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
                            url: '{{route('ajax.location.featured')}}',  // Replace with your endpoint URL
                            method: 'POST',
                            data: {featured: checkboxValue, location_id: checkboxId},  // Additional data to send
                            success: function (response) {
                                // Handle the response from the server
                                console.log(response);
                                if (response.status === 'success') {
                                    showToast('success', 'Featured status updated successfully');
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
