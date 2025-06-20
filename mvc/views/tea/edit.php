{{ include('layouts/header.php', {title: 'Tea Edit'}) }}
<div class="container">
    <h1>Tea Edit</h1>
    <form method="post">
        <label>Type
            <input type="text" name="type" value="{{ tea.type }}">
        </label>
        {% if errors.type is defined %}
        <span class="error">{{ errors.type }}</span>
        {% endif %}

        <label>Brand
            <input type="text" name="brand" value="{{ tea.brand }}">
        </label>
        {% if errors.brand is defined %}
        <span class="error">{{ errors.brand }}</span>
        {% endif %}

        <label>Description
            <textarea name="description">{{ inputs.description }}</textarea>
        </label>
        {% if errors.description is defined %}
        <span class="error">{{ errors.description }}</span>
        {% endif %}

        <label>Price
            <input type="number" step="0.01" name="price" value="{{ tea.price }}">
        </label>
        {% if errors.price is defined %}
        <span class="error">{{ errors.price }}</span>
        {% endif %}

        <input type="submit" class="bouton" value="Save">
    </form>
</div>
{{ include('layouts/footer.php') }}