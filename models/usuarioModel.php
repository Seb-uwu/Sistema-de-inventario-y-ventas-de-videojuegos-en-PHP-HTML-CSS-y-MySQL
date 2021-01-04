<?php
class usuario
{
    private $dbh;
    private $usu=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();
    }
    public function listar_usuario()
    {
        /*$sql="SELECT * FROM usuario;";
        $stmt=$this->dbh->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch())
        {
            $this->ven[]=$row;
        }
        return $this->ven;
        $this->dbh=null;*/

        $stmt = $this->dbh->prepare('call listar_usuario();');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->usu[] = $row;
        }

        return $this->usu;
        $this->dbh = null;
    }
    public function agregar_usuario()
    {
        /*$sql="insert into usuario values (null,?,?,?,?,?,?);";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(1,$i);
        $stmt->bindParam(2,$o);
        $stmt->bindParam(3,$p);
        $stmt->bindParam(4,$e);
        $stmt->bindParam(5,$r);
        $stmt->bindParam(6,$y);


        $i=strip_tags($_POST['nom']);
        $o=strip_tags($_POST['cor']);
        $p=strip_tags($_POST['fec']);
        $e=strip_tags($_POST['idp']);
        $r=strip_tags($_POST['usu']);
        $y=strip_tags($_POST['con']);

        $stmt->execute();
        echo "<script>
             window.location='agregar_usuario.php?m=1';
             </script>";*/

             $stmt = $this->dbh->prepare('call agregar_usuario(?,?,?,?,?);');
             $n = strip_tags($_POST['nom']);
             $c = strip_tags($_POST['cor']);
             $idp = strip_tags($_POST['idp']);
             $l = strip_tags($_POST['usu']);
             $p = strip_tags($_POST['con']);
     
             $stmt->bindParam(1, $n, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(2, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(3, $idp, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(4, $l, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(5, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->execute();
             echo "<script>
                     window.location='agregar_usuario.php?m=1';
                    </script>";
}
public function listar_usuario_id()
    {
        /*$sql = 'select * from usuario where id_usuarios=?;';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($_GET['id']));
        while ($row = $stmt->fetch()) {
            $this->ven[] = $row;
        }

        return $this->ven;
        $this->dbh = null;*/

        $stmt = $this->dbh->prepare('call listar_usuario_id(?)');
        $t = strip_tags($_GET['id']);

        $stmt->bindParam(1, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->usu[] = $row;
        }

        return $this->usu;
        $this->dbh = null;
    }

public function editar_usuario()
    {        
        /*$sql ='update usuario
                set
                nombre=? ,
                correo=? ,
                fecha_ingreso=? ,
                id_perfil=? ,
                login=? ,
                pass=? 
                where id_usuarios=?;';

        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(1, $n);
        $stmt->bindParam(2, $t);
        $stmt->bindParam(3, $d);
        $stmt->bindParam(4, $c);
        $stmt->bindParam(5, $e);
        $stmt->bindParam(6, $f);
        $stmt->bindParam(7, $g);

        $n = strip_tags($_POST['nom']);
        $t = strip_tags($_POST['cor']);
        $d = strip_tags($_POST['fec']);
        $c = strip_tags($_POST['idp']);
        $e = strip_tags($_POST['usu']);
        $f = strip_tags($_POST['con']);
        $g = strip_tags($_GET['id']);

        $stmt->execute();
        echo "<script>
                window.location='usuario.php';
               </script>";*/

        $stmt = $this->dbh->prepare('call editar_usuario(?,?,?,?,?,?);');

        $n = strip_tags($_POST['nom']);
        $c = strip_tags($_POST['cor']);
        $idp = strip_tags($_POST['idp']);
        $l = strip_tags($_POST['usu']);
        $p = strip_tags($_POST['con']);
        $id = strip_tags($_GET['id']);
              
        $stmt->bindParam(1, $n, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(2, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(3, $idp, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(4, $l, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(5, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(6, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
            echo "<script>
                    window.location='usuario.php';
                </script>";
    }
    public function eliminar_usuario()
    {        
        /*$sql ='delete from usuario where id_usuarios=?;';

        $stmt = $this->dbh->prepare($sql);
             
        $stmt->execute(array($_GET['id']));
        echo "<script>
               alert('Registro eliminado con exito...');
               window.location='usuario.php';
               </script>";*/

        $stmt = $this->dbh->prepare('call eliminar_usuario(?);');
        $cod = strip_tags($_GET['id']);
        $stmt->bindParam(1, $cod, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                alert('Registro Eliminado con Exito...');
                window.location='usuario.php';
                </script>";
    }
}
?>