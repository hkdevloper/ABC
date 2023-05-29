@extends('main')

@section("content")
{{-- Main Content goes Here --}}
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    General Report
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-dashboard.general-report-card title="Total Revenue" icon="dollar-sign" value="4.510" name="Total Revenue"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Users" icon="user" value="4.510" name="Total Users"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Locations" icon="map" value="4.510" name="Locations"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Listings" icon="list" value="4.510" name="Listings"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Events" icon="radio" value="4.510" name="Events"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Classifieds" icon="box" value="4.510" name="Cllasifieds"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Properties" icon="home" value="4.510" name="Properties"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Jobs" icon="briefcase" value="4.510" name="Jobs" status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Deals" icon="framer" value="4.510" name="Deals"
                    status="bar-chart-2" />
                <x-dashboard.general-report-card title="Total Articles" icon="book" value="4.510" name="Articles"
                    status="bar-chart-2" />
            </div>
        </div>
    </div>
    @endsection

    @section('page-scripts')
    {{-- Scripts for this page goes here --}}
        <script>
            @if(session()->has('msg'))
            showToast('{{ session()->get('type', 'info') }}', '{{ session()->get('msg') }}');
            @endif

            @if($errors->any())
            @foreach ($errors->all() as $error)
            showToast('error', '{{ $error }}');
            @endforeach
            @endif
        </script>
    @endsection
