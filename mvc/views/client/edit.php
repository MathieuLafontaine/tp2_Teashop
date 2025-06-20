{{ include('layouts/header.php', {title: 'Client Edit'})}}
<div class="container">
    <h1>Client Edit</h1>
    <form method="post">
        <label>Name
            <input type="text" name="name" value="{{client.name}}">
        </label>
        {% if errors.name is defined %}
        <span class="error">{{errors.name}}</span>
        {% endif %}
        <label>Email
            <input type="email" name="email" value="{{client.email}}">
        </label>
        {% if errors.email is defined %}
        <span class="error">{{errors.email}}</span>
        {% endif %}
        <input type="submit" class="bouton" value="Save">
        <label>Username
            <input type="text" name="username" value="{{client.username}}">
        </label>
        <label>Password
            <input type="text" name="password">
        </label>
    </form>
</div>
{{ include('layouts/footer.php')}}