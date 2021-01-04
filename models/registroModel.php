<?php
class registro_model
{
    private $dbh;
    private $regis=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();     
           
    }
    
    public function registro()
    {
        if(empty($_POST['usu']) and empty($_post['pass']))
        {
            echo "<script type='text/javascript'>
                  window.location='registrar.php?m=1';
                  </script>";
        }
        
        if(empty($_POST['correo']) || strpos($_POST['correo'],"@")===false)
        {
            echo "<script type='text/javascript'>
                  window.location='registrar.php?m=2';
                  </script>";
        }

        else
        {
            $stmt = $this->dbh->prepare('call agregar_usuario(?,?,?,?,?);');
            $n = strip_tags($_POST['nom']);
            $c = strip_tags($_POST['correo']);
            $idp = 3;
            $l = strip_tags($_POST['usu']);
            $p = strip_tags($_POST['pass']);
    
            $stmt->bindParam(1, $n, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->bindParam(2, $c, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->bindParam(3, $idp, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->bindParam(4, $l, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->bindParam(5, $p, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->execute();
            echo "<script>
                    window.location='registrar.php?m=3';
                   </script>";
        }
            
    }
    public function buscarepetido()
    {
        $usu=$_POST['usu'];
        $contra=$_POST['pass'];
        $conex=mysqli_connect("localhost","root","","venta_videojuegos");
        $sql="select * from usuarios
        where usuario='$usu'
        and contraseña='$pass'";
        $result=mysqli_query($conex,$sql);
        $filas=mysql_num_rows($result);
        if ($filas>0) {
            echo "<script type='text/javascript'>
                  window.location='registrar.php?m=3';
                  </script>";
        }
    }
}
?>