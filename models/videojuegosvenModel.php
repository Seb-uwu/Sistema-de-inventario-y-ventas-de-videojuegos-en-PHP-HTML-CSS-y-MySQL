<?php
class videojuegosven
{
    private $dbh;
    private $vidv=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();
    }
    public function listar_videojuegosven()
    {

        $stmt = $this->dbh->prepare('call listar_videojuegosven();');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->vidv[] = $row;
        }
        return $this->vidv;
        $this->dbh = null;
    }
    public function agregar_videojuegosven()
    {

        $stmt = $this->dbh->prepare('call agregar_videojuegosven(?,?);');
        $idv = strip_tags($_POST['idv']);
        $c = strip_tags($_POST['can']);

        $stmt->bindParam(1, $idv, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(2, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                window.location='agregar_videojuegosven.php?m=1';
               </script>";
}
public function listar_videojuegosven_id()
    {

        $stmt = $this->dbh->prepare('call listar_videojuegosven_id(?)');
        $t = strip_tags($_GET['id']);

        $stmt->bindParam(1, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->vidv[] = $row;
        }

        return $this->vidv;
        $this->dbh = null;
    }

public function editar_videojuegosven()
    {        

    $stmt = $this->dbh->prepare('call editar_videojuegosven(?,?,?);');
    $idv = strip_tags($_POST['idv']);
    $c = strip_tags($_POST['can']);
    $id = strip_tags($_GET['id']);

    $stmt->bindParam(1, $idv, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->bindParam(2, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->bindParam(3, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->execute();
    echo "<script>
            window.location='videojuegosven.php';
           </script>";
    }
    public function eliminar_videojuegosven()
    {        

        $stmt = $this->dbh->prepare('call eliminar_videojuegosven(?);');
        $id = strip_tags($_GET['id']);
        $stmt->bindParam(1, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                alert('Registro Eliminado con Exito...');
                window.location='videojuegosven.php';
               </script>";
    }
}
?>