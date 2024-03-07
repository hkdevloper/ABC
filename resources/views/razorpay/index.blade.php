@extends('layouts.user')

@section('head')
    <title>Razorpay Payment Gateway</title>
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
        }
        .panel {
            margin-top: 50px;
        }

        .panel-body {
            padding: 50px;
        }

        form{
            width: 50%;
            margin: 0 auto;
        }

        button{
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
@endsection

@section('content')
    <div class="container panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent">Razorpay Payment Gateway</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('razorpay.make.payment') }}" method="POST" class="shadow-lg p-4">
                @csrf
                <div class="mb-4">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Enter Amount:</label>
                    <input type="text" name="amount" id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <!-- Helper Text -->
                    <p class="text-orange-500 text-xs italic">
                        Please enter the amount in INR.
                    </p>
                </div>
                <button id="rzp-button1">Pay</button>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script>
                    document.getElementById('rzp-button1').onclick = function(e){
                        const amount = document.getElementById('amount').value * 100;
                        const options = {
                            "key": "{{env('razorpay_api_key')}}",
                            "amount": amount,
                            "currency": "INR",
                            "name": "Acme Corp",
                            "description": "Test Transaction",
                            "callback_url": "{{ route('razorpay.make.payment') }}",
                            "prefill": {
                                "name": '{{auth()->user()->name }}',
                                "email": '{{auth()->user()->email }}',
                                "contact": '{{auth()->user()->company->phone }}'
                            },
                            "theme": {
                                "color": "#c177ff"
                            }
                        };
                        let rzp1 = new Razorpay(options);
                        rzp1.open();
                        e.preventDefault();
                    }
                </script>
            </form>
        </div>
    </div>
@endsection
