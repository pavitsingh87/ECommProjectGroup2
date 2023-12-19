@extends('layouts.main') // Adjust this based on your layout

@section('content')
    <div class="container">
        <h2>User Transactions</h2>

        <table class="table">
            <!-- Add table headers based on your data structure -->
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <!-- Add more columns if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($userTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->order_id }}</td>
                        <td>{{ $transaction->user_id }}</td>
                        <!-- Add more columns if needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
