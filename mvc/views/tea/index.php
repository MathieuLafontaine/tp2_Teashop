{{ include('layouts/header.php', {title: 'Tea List'}) }}
<section class="index__tables">
    <h1>Tea List</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Price</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            {% for tea in teas %}
            <tr>
                <td>{{ tea.type }}</td>
                <td>{{ tea.brand }}</td>
                <td>{{ tea.description }}</td>
                <td>{{ tea.price }}</td>
                <td><a href="{{ base }}/tea/show?id={{ tea.id }}">View</a></td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
    <br><br>
    <a href="{{ base }}/tea/create" class="bouton">New Tea</a>
</section>
{{ include('layouts/footer.php') }}