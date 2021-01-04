<?php
class categoria
{
    private $dbh;
    private $cat=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();
    }
    public function listar_categoria()
    {

        $stmt = $this->dbh->prepare('call listar_categoria();');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->cat[] = $row;
        }
        return $this->cat;
        $this->dbh = null;
    }
    public function agregar_categoria()
    {

        $stmt = $this->dbh->prepare('call agregar_categoria(?);');
        $p = strip_tags($_POST['cat']);

        $stmt->bindParam(1, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                window.location='agregar_categoria.php?m=1';
               </script>";
}
public function listar_categoria_id()
    {

        $stmt = $this->dbh->prepare('call listar_categoria_id(?)');
        $c = strip_tags($_GET['id']);

        $stmt->bindParam(1, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->cat[] = $row;
        }

        return $this->cat;
        $this->dbh = null;
    }

public function editar_categoria()
    {        

    $stmt = $this->dbh->prepare('call editar_categoria(?,?);');
    $c = strip_tags($_POST['cat']);
    $id = strip_tags($_GET['id']);

    $stmt->bindParam(1, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->bindParam(2, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->execute();
    echo "<script>
            window.location='categoria.php';
           </script>";
    }
    public function eliminar_categoria()
    {        

        $stmt = $this->dbh->prepare('call eliminar_categoria(?);');
        $id = strip_tags($_GET['id']);
        $stmt->bindParam(1, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                alert('Registro Eliminado con Exito...');
                window.location='categoria.php';
               </script>";
    }
}
?>