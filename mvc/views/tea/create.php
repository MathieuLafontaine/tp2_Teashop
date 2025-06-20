{{ include('layouts/header.php', {title: 'Add a New Tea'}) }}
<div class="container">
    <h1>Add a New Tea</h1>
    <form action="{{base}}/tea/store" method="post">
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
            <textarea name="description">{{ tea.description }}</textarea>
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