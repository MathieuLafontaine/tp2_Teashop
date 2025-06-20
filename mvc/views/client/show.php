{{ include('layouts/header.php', {title: 'Client Show'}) }}
<div class="container">
    <h1>Client</h1>
    <p><strong>Name: </strong>{{ client.name }}</p>
    <p><strong>Username: </strong>{{ client.username }}</p>
    <p><strong>Password: </strong>**********</p>
    <p><strong>Email: </strong>{{ client.email }}</p>
    <a href="{{ base }}/client/edit?id={{client.id}}" class="bouton">Edit</a>
    <form action="{{ base }}/client/delete" method="post">
        <input type="hidden" name="id" value="{{ client.id }}">
        <button type="submit" class="bouton delete">Delete</button>
    </form>
</div>
{{ include('layouts/footer.php') }}