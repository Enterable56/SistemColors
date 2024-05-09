
<?php include "Views/Templates/Header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Categorias</li>
 </ol>
 <button class="btn btn-primary mb-2"  type="button" onclick="frmCategoria();"> <i class= "fas fa-plus"></i></button>
 <table class="table table-dark" id="tblCategorias">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Categoria</th> 
            <th></th>
            
        </tr>
        
    </thead>
    <tbody>

    </tbody> 
 </table>
<br>


<?php include "Views/Templates/Footer.php";?>