<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <title>Test</title>
</head>
<body>
<div class="container">
<p>Usuarios</p>
    <table class="table table-striped table-bordered" id="users">
        <thead>
            <tr>
                <th>UserId</th>
                <th>id</th>
                <th>title</th>
                <th>completed</th>
                <th></th>
              </tr>
        </thead>
    
   </table>
   <p>Editar elemento</p>
   <input id="id" placeholder="id" class=" d-none"></input>

   <input id="title" placeholder="title" class="form-control col-xl-6"></input>
   <select id="completed"class="form-control mt-2">
    <option value="false">false</option>
    <option value="true">true</option>

  </select>
   <button type="button" onclick="btn_editar()" class="btn btn-primary mt-2">Editar</button>

</div>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    let users;
axios.get('https://jsonplaceholder.typicode.com/todos/')
.then(response => {
    users = response.data;
    localStorage.setItem('users', JSON.stringify(users));
   console.log(users);
})
.catch(e => {
    // Podemos mostrar los errores en la consola
    console.log(e);
});

var table = $('#users').DataTable(
            
            {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No hay registros",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ total de registros)",
                    "search":         "Buscar:",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                },
                ajax: {
               cache: true,
                url: `https://jsonplaceholder.typicode.com/todos/`,
                dataSrc: ''
            },
                columns:
                [
                { "data": "userId"},
                { "data": "id"},
                { "data": "title"},
                { "data": "completed"},
                
                { "defaultContent": "<button class='btn btn-primary ml-2' onclick='actualizar(this)'>Editar</button><button onclick='btn_drop(this)' class='btn btn-primary '>Eliminar</button>"},

                    ]
            }
            );

            function btn_drop(s){
                console.log(users);
            document.getElementById("users").deleteRow(s.parentNode.parentNode.rowIndex);
             
         }
         function actualizar(s){
           
              let id=  s.parentNode.parentNode.cells[1].innerHTML;
              let title=  s.parentNode.parentNode.cells[2].innerHTML;
              let completed=   s.parentNode.parentNode.cells[3].innerHTML;
              let node = s.parentNode.parentNode;
                document.getElementById("id").value=id; 
                document.getElementById("title").value=title;
                document.getElementById("completed").value=completed;

         }
         function btn_editar(){
            let id= document.getElementById("id").value;
            let title= document.getElementById("title").value;
            let completed= document.getElementById("completed").value;
            let node = document.getElementById("users").rows[id];
            node.cells[2].innerHTML=title;
            node.cells[3].innerHTML=completed;
         }
            
</script>
</body>
</html>