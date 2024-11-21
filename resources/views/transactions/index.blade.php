<x-layout>
    <section class="custom-container nav-margin">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-white">Transactions</h2>
        <div class="d-flex gap-2">

            @foreach ($transactions as $transaction)
                <div class="card text-bg-dark" style="width: 18rem;">
                    <div class="card-body">
                        <h4>Room: {{ $transaction->room->room_name }}</h4>
                        <p>Check-in: {{ $transaction->check_in_date }}</p>
                        <p>Check-out: {{ $transaction->check_out_date }}</p>
                        <p>Payment Status: {{ $transaction->payment_status }}</p>
                        <p>Transaction Status: {{ $transaction->status }}</p>

                        @if ($transaction->payment_status === 'Pending')
                            <form action="{{ route('transactions.pay', $transaction->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success">Pay Now</button>
                            </form>
                        @endif

                        @if ($transaction->payment_status === 'Paid' && $transaction->status !== 'Checked Out')
                            <form action="{{ route('transactions.checkout', $transaction->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary">Checkout</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
