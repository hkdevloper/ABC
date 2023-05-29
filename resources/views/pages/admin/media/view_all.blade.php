@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        All Media Files
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Upload type</th>
                            <th class="border-b-2 whitespace-no-wrap">MIME</th>
                            <th class="border-b-2 whitespace-no-wrap">Size</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medias as $data)
                            <tr>
                                <td class="border-b">{{$data->id}}</td>
                                <td class="border-b">{{$data->name}}</td>
                                <td class="border-b">{{$data->upload_type}}</td>
                                <td class="border-b">{{$data->mime_type}}</td>
                                <td class="border-b w-40">
                                    @php
                                        // get the size in Kb
                                        $size = $data->size / 1024;
                                        // get only two decimal point of the size
                                        $size = round($size, 2);
                                        echo "$size KB";
                                    @endphp
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        @if($data->is_downloadable)
                                            <a class="flex items-center mr-3" href="{{\Illuminate\Support\Facades\Storage::download('public/'.$data->path)}}">
                                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Download </a>
                                        @endif
                                        @if($data->is_deletable)
                                            <a class="flex items-center text-theme-6"
                                               onclick="confirm('Are you sure?') ? window.location.replace('{{route('delete.media', ['id'=> $data->id])}}') : ''"
                                               href="javascript:"> <i data-feather="trash-2" class="w-4 h-4 mr-1" onclick=""></i> Delete
                                            </a>
                                        @endif
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
