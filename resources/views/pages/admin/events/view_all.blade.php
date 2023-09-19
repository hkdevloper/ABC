@extends('layouts.main-admin')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Events
                    </h2>
                    <div class="flex ml-auto">
                        <a href="{{route('add.event')}}"
                           class="ml-auto note-btn flex text-theme-1 dark:text-theme-10 mx-1">
                            Add New Event
                        </a>
                    </div>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">Title</th>
                            <th class="border-b-2 whitespace-no-wrap">Category</th>
                            <th class="border-b-2 whitespace-no-wrap">Start</th>
                            <th class="border-b-2 whitespace-no-wrap">End</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td class="border-b">{{$event->id}}</td>
                                <td class="border-b">{{$event->title}}</td>
                                <td class="border-b">{{$event->category}}</td>
                                <td class="border-b">{{$event->start}}</td>
                                <td class="border-b">{{$event->end}}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{route('edit.event', [$event->id])}}">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6"
                                           onclick="confirm('Are you sure?') ? window.location.replace('{{route('delete.event', [$event->id])}}') : ''"
                                           href="javascript:"> <i data-feather="trash-2" class="w-4 h-4 mr-1"
                                                                  onclick=""></i> Delete
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

@endsection
