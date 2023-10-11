@extends('layouts.main-admin')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        User Groups
                    </h2>
                    <a href="{{route('add.user.group')}}" class="ml-auto flex text-theme-1 dark:text-theme-10">
                        <i data-feather="plus-square" class="w-4 h-4 mr-1"></i> Add New Group
                    </a>
                </div>
                {{-- Main Content goes Here --}}

                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">GROUP</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $data)
                            <tr>
                                <td class="border-b">{{$data->id}}</td>
                                <td class="border-b">{{$data->name}}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{route('edit.user.group', ['id'=>$data->id])}}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        @if($data->allow_delete == 1)
                                            <a class="flex items-center text-theme-6" onclick="confirm('Are you sure?') ? window.location.replace('{{route('delete.user.group', ['id'=> $data->id])}}') : ''"
                                               href="javascript:"> <i
                                                    data-feather="trash-2" class="w-4 h-4 mr-1" onclick=""></i> Delete
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END: Datatable -->
            </div>
        </div>
@endsection

@section('page-scripts')
    {{-- Scripts for this page goes here --}}
@endsection