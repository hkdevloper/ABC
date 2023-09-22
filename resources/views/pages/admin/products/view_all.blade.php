@extends('layouts.main-admin')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Products
                    </h2>
                    <div class="flex ml-auto">
                        <a href="{{route('add.product')}}"
                           class="ml-auto note-btn flex text-theme-1 dark:text-theme-10 mx-1">
                            Add New Product
                        </a>
                    </div>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <table class="table table-report table-report--bordered display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">#ID</th>
                            <th class="border-b-2 whitespace-no-wrap">Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Price</th>
                            <th class="border-b-2 whitespace-no-wrap">Condition</th>
                            <th class="border-b-2 whitespace-no-wrap">Brand</th>
                            <th class="border-b-2 whitespace-no-wrap">Approved</th>
                            <th class="border-b-2 whitespace-no-wrap">Claimed</th>
                            <th class="border-b-2 whitespace-no-wrap">Featured</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$products)
                            <tr>
                                <td colspan="7" class="text-center p-5">No Products Found</td>
                            </tr>
                        @else
                            @foreach($products as $product)
                                <tr>
                                    <td class="border-b">
                                        <div class="font-medium whitespace-no-wrap">{{$product->id}}</div>
                                    </td>
                                    <td class="border-b">
                                        <div class="font-medium ">{{$product->name}}</div>
                                    </td>
                                    <td class="border-b">
                                        <div class="font-medium whitespace-no-wrap">{{$product->price}}</div>
                                    </td>
                                    <td class="border-b">
                                        <div class="font-medium whitespace-no-wrap">{{$product->condition}}</div>
                                    </td>
                                    <td class="border-b">
                                        <div class="font-medium whitespace-no-wrap">{{$product->brand}}</div>
                                    </td>
                                    <td class="border-b">
                                        <div class="mt-2">
                                            <input type="checkbox" @if($product->is_active) checked
                                                   @endif data-id="{{$product->id}}" class="input input--switch border">
                                        </div>
                                    </td>
                                    <td class="border-b">
                                        <div class="mt-2">
                                            <input type="checkbox" @if($product->is_claimed) checked
                                                   @endif data-id="{{$product->id}}" class="input input--switch border">
                                        </div>
                                    </td>
                                    <td class="border-b">
                                        <div class="mt-2">
                                            <input type="checkbox" @if($product->is_featured) checked
                                                   @endif data-id="{{$product->id}}" class="input input--switch border">
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                               href="{{route('edit.product', [$product->id])}}">
                                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-theme-6"
                                               onclick="confirm('Are you sure?') ? window.location.replace('{{route('delete.product', [$product->id])}}') : ''"
                                               href="javascript:"> <i data-feather="trash-2" class="w-4 h-4 mr-1"
                                                                      onclick=""></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

@section('page-scripts')
    {{-- Scripts for this page goes here --}}

@endsection
