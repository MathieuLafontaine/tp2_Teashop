 {{ include('layouts/header.php', {title: 'Clients List'})}}
 <section class="index__tables">
     <h1>Clients</h1>
     <table>
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Username</th>
                 <th>Password</th>
                 <th>Email</th>
                 <th>View</th>
             </tr>
         </thead>
         <tbody>
             {% for client in clients %}
             <tr>
                 <td>{{ client.name }}</td>
                 <td>{{ client.username }}</td>
                 <td>*********</td>
                 <td>{{ client.email }}</td>
                 <td><a href="{{base}}/client/show?id={{ client.id }}">View</a></td>
             </tr>
             {% endfor %}
         </tbody>
     </table>
     <br><br>
     <a href="{{ base }}/client/create" class="bouton">New Client</a>
 </section>
 {{ include('layouts/footer.php')}}