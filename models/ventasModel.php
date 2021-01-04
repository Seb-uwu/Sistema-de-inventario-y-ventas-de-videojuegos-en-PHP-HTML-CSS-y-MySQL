<?php
class ventas
{
    private $dbh;
    private $ven=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();
    }
    public function listar_ventas()
    {
        $stmt = $this->dbh->prepare('call listar_ventas();');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->ven[] = $row;
        }

        return $this->ven;
        $this->dbh = null;
    }
    public function agregar_ventas()
    {

             $stmt = $this->dbh->prepare('call agregar_ventas(?,?,?,?,?);');
             $idv = strip_tags($_POST['idv']);
             $idc = strip_tags($_POST['idc']);
             $c = strip_tags($_POST['can']);
             $f = strip_tags($_POST['fec']);
             $t = strip_tags($_POST['tot']);
     
             $stmt->bindParam(1, $idv, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(2, $idc, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(3, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(4, $f, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(5, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->execute();
             echo "<script>
                     window.location='agregar_ventas.php?m=1';
                    </script>";
}
public function listar_ventas_id()
    {

        $stmt = $this->dbh->prepare('call listar_ventas_id(?)');
        $t = strip_tags($_GET['id']);

        $stmt->bindParam(1, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->ven[] = $row;
        }

        return $this->ven;
        $this->dbh = null;
    }

public function editar_ventas()
    {        

        $stmt = $this->dbh->prepare('call editar_ventas(?,?,?,?,?,?);');

        $idv = strip_tags($_POST['idv']);
        $idc = strip_tags($_POST['idc']);
        $c = strip_tags($_POST['can']);
        $f = strip_tags($_POST['fec']);
        $t = strip_tags($_POST['tot']);
        $id = strip_tags($_GET['id']);
              
        $stmt->bindParam(1, $idv, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(2, $idc, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(3, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(4, $f, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(5, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(6, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
            echo "<script>
                    window.location='ventas.php';
                </script>";
    }
    public function eliminar_ventas()
    {        
 
        $stmt = $this->dbh->prepare('call eliminar_ventas(?);');
        $cod = strip_tags($_GET['id']);
        $stmt->bindParam(1, $cod, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                alert('Registro Eliminado con Exito...');
                window.location='ventas.php';
                </script>";
    }
}
?>