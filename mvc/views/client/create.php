 {{ include('layouts/header.php', {title: 'Client Create'})}}
 <div class="container">
     <h1>Add a New Client</h1>
     <form action="{{base}}/client/store" method="post">
         <label>Name
             <input type="text" name="name" value="{{ inputs.name }}">
         </label>
         {% if errors.name is defined %}
         <span class="error">{{ errors.name }}</span>
         {% endif %}

         <label>Username
             <input type="text" name="username">
         </label>

         <label>Password
             <input type="text" name="password">
         </label>

         <label>Email
             <input type="email" name="email" value="{{ inputs.email }}">
         </label>
         {% if errors.email is defined %}
         <span class="error">{{ errors.email }}</span>
         {% endif %}
         <input type="submit" class="bouton" value="Save">
     </form>
 </div>
 {{ include('layouts/footer.php')}}