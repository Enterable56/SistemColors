<?php include "Views/Templates/Header.php";?>
<form method="POST" action="Config/App/restore.php" enctype="multipart/form-data">
    <input type="file" name="file" accept=".sql">
    <button type="submit" name="restore">Restaurar BD</button>
  </form>

<?php include "Views/Templates/Footer.php";?>