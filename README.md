# ASSETTRACK --> PHP + LARAVEL

Este proyecto es la entrega final del curso de GeeksHub academy. Consiste en un software para la gestion de invetarios (productos-proveedores), activos, proyectos y equipos de una empresa.

Este proyecto corresponde al back-end , por lo tanto, para visualizar el repositorio del front-end sigue este link 
👉 [Repo Front](https://github.com/Orianig/AssetTrack_Front_React) 👈

Para interactuar con mi software te dejo el siguiente link
👉 [web del software](https://main--chimerical-trifle-d21da6.netlify.app/) 👈

## Diseño bbdd

![Configuracion de la base de datos](https://github.com/Orianig/AssetTrack_Back_Php/blob/main/resources/images/bbdd.png)

## Tecnologías utilizadas
  
- JavaScript
- Postman
- Laravel
- Php
- MySQL

##  Endpoints
<details>
  <summary><strong>Endpoints:</strong></summary>
    
• AUTH

 /register

  POST `http://127.0.0.1:8000/api/auth/register`

body:
  
```
    {
       name
       surname
       email
       password
    }
```
  
/login

body:
  
```
    {
        "email":"oriana@example.com",
        "password":"123456Aa"
    }
 ```
  
  POST `http://127.0.0.1:8000/api/auth/login`

  • USER
  
 /profile
  
  GET `http://127.0.0.1:8000/api/user/profile`

/allProfiles

 GET `http://127.0.0.1:8000/api/user/allUsers`
  
 /UpdateProfile

  PUT `http://127.0.0.1:8000/api/user/updateProfile`
  
 /userTeams

  GET `http://127.0.0.1:8000/api/user/teams`

   /userProjects

  GET `http://127.0.0.1:8000/api/user/projects`

   • TEAMS
  
 /allTeams
  
  GET `http://127.0.0.1:8000/api/team/allTeams`

/newTeam (Admin)

POST `http://127.0.0.1:8000/api/team/newTeam`

/updateTeam (Admin)

PUT `http://127.0.0.1:8000/api/team/updateTeam`

 • PROJECTS
  
 /allProjects
  
  GET `http://127.0.0.1:8000/api/project/allProjects`

/newProject (Admin)

POST `http://127.0.0.1:8000/api/project/newProject`

/updateProject (Admin)

PUT `http://127.0.0.1:8000/api/project/updateProject`

/deleteProject (Admin)

PUT `http://127.0.0.1:8000/api/project/deleteProject`

</details>

## Licencia

License and Copyright Add MIT Licence. The style is completely created by Oriana Infante. 


