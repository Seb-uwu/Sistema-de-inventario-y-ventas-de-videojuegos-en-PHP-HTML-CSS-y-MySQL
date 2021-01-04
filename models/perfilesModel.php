<?php
class perfiles
{
    private $dbh;
    private $per=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();
    }
    public function listar_perfiles()
    {

        $stmt = $this->dbh->prepare('call listar_perfiles();');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->per[] = $row;
        }
        return $this->per;
        $this->dbh = null;
    }
    public function agregar_perfiles()
    {

        $stmt = $this->dbh->prepare('call agregar_perfiles(?);');
        $p = strip_tags($_POST['perfil']);

        $stmt->bindParam(1, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                window.location='agregar_perfiles.php?m=1';
               </script>";
}
public function listar_perfiles_id()
    {

        $stmt = $this->dbh->prepare('call listar_perfiles_id(?)');
        $t = strip_tags($_GET['id']);

        $stmt->bindParam(1, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->per[] = $row;
        }

        return $this->per;
        $this->dbh = null;
    }

public function editar_perfiles()
    {        

    $stmt = $this->dbh->prepare('call editar_perfiles(?,?);');
    $p = strip_tags($_POST['perfil']);
    $id = strip_tags($_GET['id']);

    $stmt->bindParam(1, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->bindParam(2, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->execute();
    echo "<script>
            window.location='perfiles.php';
           </script>";
    }
    public function eliminar_perfiles()
    {        

        $stmt = $this->dbh->prepare('call eliminar_perfiles(?);');
        $id = strip_tags($_GET['id']);
        $stmt->bindParam(1, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                alert('Registro Eliminado con Exito...');
                window.location='perfiles.php';
               </script>";
    }
}
?>