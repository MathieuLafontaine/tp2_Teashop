{{ include('layouts/header.php', {title: 'Transaction List'}) }}
<section class="index__tables">
    <h1>Transactions</h1>
    <p>Transactions are entered automatically by the system. No editing can be made without proper priviledges.</p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Client Name</th>
                <th>Tea Type</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            {% for row in transactions %}
            <tr>
                <td>{{ row.date }}</td>
                <td>{{ row.client_name }}</td>
                <td>{{ row.type }}</td>
                <td>{{ row.quantity }}</td>
                <td>${{ row.totalPrice }}</td>
                <td>{{ row.paymentmethod_name }}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</section>
{{ include('layouts/footer.php') }}