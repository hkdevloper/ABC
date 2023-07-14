
@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add Blog
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                @if($packageId == NULL)
                    <div class="intro-y box flex flex-col lg:flex-row mt-5">
                        @foreach($membershipPackage as $data)
                            <div class="intro-y flex-1 px-5 py-16">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card w-12 h-12 text-theme-1 mx-auto"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <div class="text-xl font-medium text-center mt-10">{{$data['name']}}</div>
                                <div class="text-gray-700 text-center mt-5">
                                    @if($data['description'] != NULL)
                                        {!! $data['description'] !!}
                                    @else
                                        No Description
                                    @endif
                                </div>
                                <div class="intro-y box mt-5">
                                    @if($data['plans'] == NULL)
                                        No Plans Available
                                    @endif
                                    @foreach($data['plans'] as $plan)
                                        <a href="{{route('add.company', ['membership_package' => "1"])}}" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8">{{$plan['billing_interval']}} {{$plan['billing_period']}} for @if($plan['price'] == 0) Free @else{{$plan['price']}}$@endif</a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="intro-y datatable-wrapper box p-5 mt-5">
                        <div>
                            <label>Email</label>
                            <input type="email" class="input w-full border mt-2" placeholder="example@gmail.com">
                        </div>
                        <button type="button" class="button bg-theme-1 text-white mt-5">Submit</button>
                    </div>
                @endif
            </div>
        </div>
@endsection

@section('page-scripts')
    {{-- Scripts for this page goes here --}}

@endsection
