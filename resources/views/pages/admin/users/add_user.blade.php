@extends('main')

@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add new user
                    </h2>
                </div>
                {{-- Main Content goes Here --}}
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <form action="{{route('add.user')}}" method="post" class="intro-y box p-5">
                            @csrf
                            <div>
                                <label>First name</label>
                                <input name="first_name" type="text" class="input w-full border mt-2"
                                       placeholder="Enter first name" required value="{{old('first_name')}}">
                            </div>
                            <div>
                                <label>Last name</label>
                                <input name="last_name" type="text" class="input w-full border mt-2"
                                       placeholder="Enter last name" required value="{{old('last_name')}}">
                            </div>
                            <div>
                                <label>Account Balance</label>
                                <div class="relative">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                        $
                                    </div>
                                    <input name="account_balance" type="number" required value="{{old('account_balance')}}"
                                           class="input pl-12 w-full border col-span-4" placeholder="Account Balance">
                                    <div
                                        class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label>Email</label>
                                <input name="email" type="text" class="input w-full border mt-2" value="{{old('email')}}"
                                       placeholder="Enter Email" required>
                            </div>
                            <div>
                                <label>Password</label>
                                <input name="password" type="password" class="input w-full border mt-2"
                                       placeholder="Enter password" required>
                            </div>
                            <div>
                                <label>Password</label>
                                <input name="password_confirmation" type="text" class="input w-full border mt-2"
                                       placeholder="Confirm Password" required>
                            </div>
                            <div class="mt-3">
                                <label>User Group</label>
                                <div class="mt-2">
                                    <select name="group_id" id="roles" required class="select2 w-full">
                                        @foreach($groups as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="grid grid-cols-4 gap-3">
                                    <div class="mt-3">
                                        <label>Approved</label>
                                        <input type="checkbox" name="approved" value="true"
                                               class="input input--switch border pt-4">
                                    </div>
                                    <div class="mt-3">
                                        <label>Email Verified</label>
                                        <input type="checkbox" name="email_verified" value="true"
                                               class="input input--switch border pt-4">
                                    </div>
                                    <div class="mt-3">
                                        <label>Banned</label>
                                        <input type="checkbox" name="banned" value="true"
                                               class="input input--switch border pt-4">
                                    </div>
                                    <div class="mt-3">
                                        <label>Taxable</label>
                                        <input type="checkbox" name="taxable" value="true"
                                               class="input input--switch border pt-4">
                                    </div>
                                </div>
                            </div>

                            <div class="text-right mt-5">
                                <a href="{{url()->previous()}}" class="button w-24 border text-gray-700 mr-1">Cancel</a>
                                <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                            </div>
                        </form>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('page-scripts')
            {{-- Scripts for this page goes here --}}

@endsection
