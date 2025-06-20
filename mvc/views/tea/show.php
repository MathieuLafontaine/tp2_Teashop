{{ include('layouts/header.php', {title: 'Tea Show'}) }}
<div class="container">
    <h1>Tea</h1>
    <p><strong>Type: </strong>{{ tea.type }}</p>
    <p><strong>Brand: </strong>{{ tea.brand }}</p>
    <p><strong>Description: </strong>{{ tea.description }}</p>
    <p><strong>Price: </strong>{{ tea.price }}</p>

    <a href="{{ base }}/tea/edit?id={{ tea.id }}" class="bouton">Edit</a>

    <form action="{{ base }}/tea/delete" method="post">
        <input type="hidden" name="id" value="{{ tea.id }}">
        <button type="submit" class="bouton delete">Delete</button>
    </form>
</div>
{{ include('layouts/footer.php') }}