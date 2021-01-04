<?php
class videojuegos
{
    private $dbh;
    private $vid=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();
    }
    public function listar_videojuegos()
    {
        /*$sql="SELECT * FROM productos;";
        $stmt=$this->dbh->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch())
        {
            $this->ven[]=$row;
        }
        return $this->ven;
        $this->dbh=null;*/

        $stmt = $this->dbh->prepare('call listar_videojuegos();');
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->vid[] = $row;
        }
        return $this->vid;
        $this->dbh = null;

    }
    public function agregar_videojuegos()
    {
        /*$sql="insert into productos values (null,?,?,?,?,?);";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(1,$i);
        $stmt->bindParam(2,$o);
        $stmt->bindParam(3,$p);
        $stmt->bindParam(4,$e);
        $stmt->bindParam(5,$r);

        $i=strip_tags($_POST['pro']);
        $o=strip_tags($_POST['pre']);
        $p=strip_tags($_POST['des']);
        $e=strip_tags($_POST['sto']);
        $r=strip_tags($_POST['idtp']);

        $stmt->execute();
        echo "<script>
             window.location='agregar_producto.php?m=1';
             </script>";*/
             $imgg = $_FILES ['img']['name'];
             $imgt = $_FILES ['img']['tmp_name'];
             $imgurl = "./juegos/".$imgg;
             copy($imgt,$imgurl);

             $stmt = $this->dbh->prepare('call agregar_videojuegos(?,?,?,?,?,?,?,?);');
             $cd = strip_tags($_POST['cod']);
             $n = strip_tags($_POST['nom']);
             $d = strip_tags($_POST['des']);
             $c = strip_tags($_POST['cat']);
             $s = strip_tags($_POST['sto']);
             $p = strip_tags($_POST['pre']);
             $cr = strip_tags($_POST['cre']);
             $i = $imgurl;
             
             $stmt->bindParam(1, $cd, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(2, $n, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(3, $d, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(4, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(5, $s, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(6, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(7, $cr, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
             $stmt->bindParam(8, $i);
             $stmt->execute();
             echo "<script>
                    window.location='agregar_videojuegos.php?m=1';
                   </script>";
     
}
public function listar_cat_videojuegos_id()
    {
        $sql = 'select * from categoria_videojuegos where id_categoria=?;';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($_GET['id_categoria']));
        while ($row = $stmt->fetch()) {
            $this->ven[] = $row;
        }

        return $this->ven;
        $this->dbh = null;
    }
public function listar_videojuegos_id()
    {
        /*$sql = 'select * from productos where id_producto=?;';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($_GET['id']));
        while ($row = $stmt->fetch()) {
            $this->ven[] = $row;
        }

        return $this->ven;
        $this->dbh = null;*/

        $stmt = $this->dbh->prepare('call listar_videojuegos_id(?)');
        $t = strip_tags($_GET['id']);

        $stmt->bindParam(1, $t, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $this->vid[] = $row;
        }

        return $this->vid;
        $this->dbh = null;
    }

public function editar_videojuegos()
    {        
        /*$sql ='update productos 
                set 
                producto=? ,
                precio=? ,
                des=? ,
                stock=? ,
                id_tipo_producto=? 
                where id_producto=?;';

        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(1, $n);
        $stmt->bindParam(2, $t);
        $stmt->bindParam(3, $d);
        $stmt->bindParam(4, $c);
        $stmt->bindParam(5, $e);
        $stmt->bindParam(6, $z);

        $n = strip_tags($_POST['pro']);
        $t = strip_tags($_POST['pre']);
        $d = strip_tags($_POST['des']);
        $c = strip_tags($_POST['sto']);
        $e = strip_tags($_POST['idtp']);
        $z = strip_tags($_GET['id']);
     
        $stmt->execute();
        echo "<script>
                window.location='producto.php';
               </script>";*/

        $stmt = $this->dbh->prepare('call editar_videojuegos(?,?,?,?,?,?,?,?);');

        $n = strip_tags($_POST['nom']);
        $d = strip_tags($_POST['des']);
        $c = strip_tags($_POST['cat']);
        $s = strip_tags($_POST['sto']);
        $p = strip_tags($_POST['pre']);
        $cr = strip_tags($_POST['cre']);
        $imgg = $_FILES ['img']['name'];
        $imgt = $_FILES ['img']['tmp_name'];
        $imgurl = "./juegos/".$imgg;
        copy($imgt,$imgurl);
        $i = $imgurl;
        $id = strip_tags($_GET['id']);
        
        $stmt->bindParam(1, $n, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(2, $d, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(3, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(4, $s, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(5, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(6, $cr, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->bindParam(7, $i);
        $stmt->bindParam(8, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();    
        echo "<script>
                window.location='videojuegos.php';
                    </script>";
       
    }
    public function eliminar_videojuegos()
    {        
        /*$sql ='delete from productos where id_producto=?;';

        $stmt = $this->dbh->prepare($sql);
             
        $stmt->execute(array($_GET['id']));
        echo "<script>
               alert('Registro eliminado con exito...');
               window.location='producto.php';
               </script>";*/

        $stmt = $this->dbh->prepare('call eliminar_videojuegos(?);');
        $id = strip_tags($_GET['id']);
        $stmt->bindParam(1, $id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        echo "<script>
                alert('Registro Eliminado con Exito...');
                window.location='videojuegos.php';
               </script>";

    }
}
?>