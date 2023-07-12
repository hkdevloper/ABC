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
                </div>
                <div class="box p-2 mt-5">
                    <form action="{{route('settings.tax.rates.edit', ['id' => $rate->id])}}" method="post" class="intro-y box p-5"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-center">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Name</label>
                            <input type="text" class="input w-full border mt-2 flex-1" name="name" value="{{$rate->name}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center mt-3">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Rate (%)</label>
                            <input type="number" class="input w-full border mt-2 flex-1" name="rate" value="{{$rate->rate}}">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center mt-3">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Compound</label>
                            <div class="mt-3">
                                <div class="mt-2">
                                    <input type="checkbox" class="input input--switch border" name="compound_tax" @if($rate->compound){!! "checked" !!}@endif>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full sm:flex-row mt-2">
                            <label class="w-full sm:w-20 sm:text-right sm:mr-5">Location</label>
                            <select class="select2 input w-full border mt-2 flex-1" id="new-location"
                                    name="location_id" required>
                                <option>Choose Location</option>
                            </select>
                        </div>
                        <div class="text-right mt-5">
                            <a href="{{url()->previous()}}" class="button w-24 border text-gray-700 mr-1">Cancel</a>
                            <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

        @section('page-scripts')
            {{-- Scripts for this page goes here --}}
            <script>
                $(document).ready(function () {
                    let country = $('#new-location');
                    $.get('{{route('ajax.get.country.list')}}', function (data) {
                        country.empty();
                        country.append('<option value="">Select Country</option>');
                        $.each(data, function (index, element) {
                            country.append('<option value="' + element.id + '">' + element.name + '</option>');
                        });
                    });

                    // Ajax request to update compound tax

                });
            </script>
@endsection
