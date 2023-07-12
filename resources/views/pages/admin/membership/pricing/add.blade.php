
@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add Plan
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <form action="{{route('add.membership.plan')}}" method="post">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{$parent_id}}">
                        <div>
                            <label>Billing Period</label>
                            <select required name="billing_period" id="" class="input w-full border mt-2">
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                                <option value="lifetime">Lifetime</option>
                            </select>
                        </div>
                        <div>
                            <label>Billing Interval</label>
                            <input required type="number" name="billing_interval" class="input w-full border mt-2" placeholder="Billing Interval">
                        </div>
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                $
                            </div>
                            <input required type="text" class="input px-12 w-full border col-span-4" placeholder="Price">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                .00
                            </div>
                        </div>
                        <div>
                            <label>Users Limit</label>
                            <input required type="number" name="users_limit" class="input w-full border mt-2" placeholder="Users Limit">
                        </div>
                        <div>
                            <label>Per Users Limit</label>
                            <input required type="number" name="per_users_limit" class="input w-full border mt-2" placeholder="Per Users Limit">
                        </div>
                        <div>
                            <label>Supported Payment Gateways</label>
                            <select name="supported_payment_gateways" id="" class="select2 input w-full border mt-2" multiple required>
                                @foreach($paymentMethods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <div class="mt-2" >
                                <label style="width: 180px!important; display: inline-block">Auto-approve Listings</label>
                                <input type="checkbox" class="input input--switch border">
                            </div>
                            <div class="mt-2" >
                                <label style="width: 180px!important; display: inline-block">Auto-approve Reviews</label>
                                <input type="checkbox" class="input input--switch border">
                            </div>
                            <div class="mt-2" >
                                <label style="width: 180px!important; display: inline-block">Auto-approve Comments</label>
                                <input type="checkbox" class="input input--switch border">
                            </div>
                            <div class="mt-2" >
                                <label style="width: 180px!important; display: inline-block">Auto-approve Bookings</label>
                                <input type="checkbox" class="input input--switch border">
                            </div>
                        </div>
                        <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('page-scripts')
    {{-- Scripts for this page goes here --}}

@endsection
