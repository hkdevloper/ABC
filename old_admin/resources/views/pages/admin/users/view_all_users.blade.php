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
                    <a href="{{route('add.user')}}" class="ml-auto flex text-theme-1 dark:text-theme-10">
                        <i data-feather="plus-square" class="w-4 h-4 mr-1"></i> Add New User
                    </a>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">First name</th>
                            <th class="border-b-2 whitespace-no-wrap">Last name</th>
                            <th class="border-b-2 whitespace-no-wrap">Group</th>
                            <th class="border-b-2 whitespace-no-wrap">Approved</th>
                            <th class="border-b-2 whitespace-no-wrap">Email Verified</th>
                            <th class="border-b-2 whitespace-no-wrap">Banned</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $data)
                            <tr>
                                <td class="border-b">{{$data->id}}</td>
                                <td class="border-b">{{$data->first_name}}</td>
                                <td class="border-b">{{$data->last_name}}</td>
                                <td class="border-b">{{$data->user_group}}</td>
                                <td class="border-b">
                                    <div class="mt-3">
                                        <div class="mt-2"><input data-id="{{$data->id}}" data-status="approve" type="checkbox"
                                                                 @if($data->approved)
                                                                     {!! "checked" !!}
                                                                 @endif class="input input--switch border"></div>
                                    </div>
                                </td>
                                <td class="border-b">
                                    <div class="mt-3">
                                        <div class="mt-2"><input data-id="{{$data->id}}" data-status="email_verified" type="checkbox"
                                                                 @if($data->email_verified)
                                                                     {!! "checked" !!}
                                                                 @endif class="input input--switch border"></div>
                                    </div>
                                </td>
                                <td class="border-b">
                                    <div class="mt-3">
                                        <div class="mt-2"><input data-id="{{$data->id}}" data-status="banned" type="checkbox"
                                                                 @if($data->banned)
                                                                     {!! "checked" !!}
                                                                 @endif class="input input--switch border"></div>
                                    </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3"
                                           href="{{route('edit.user', ['id'=>$data->id])}}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6"
                                           onclick="confirm('Are you sure?') ? window.location.replace('{{route('delete.user', ['id'=> $data->id])}}') : ''"
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
                        var userId = $(this).data('id');
                        var status = $(this).data('status');

                        // Make the AJAX POST request
                        $.ajax({
                            url: '{{route('ajax.user.status')}}',  // Replace with your endpoint URL
                            method: 'POST',
                            data: {user_id: userId, status: status, value: checkboxValue},  // Additional data to send
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
