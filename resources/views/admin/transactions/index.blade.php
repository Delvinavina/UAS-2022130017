<x-layout-admin>
    <section class="dashboard custom-container nav-margin">
        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Reservation Room</p>
        </div>
        <div class="dashboard-content">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Reservation ID</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Method</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->reser_id }}</td>
                            <td>{{ $transaction->total_price }}</td>
                            <td>{{ $transaction->method }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}
        </div>
    </section>
</x-layout-admin>
