<?php
class acceso_model
{
    private $dbh;
    private $perfil=array();

    public function __construct()
    {
        $this->dbh=conectar::conexion();        
    }
    public function logueo()
    {
        if(empty($_POST['login']) and empty($_post['pass']))
        {
            echo "<script type='text/javascript'>
                  window.location='index.php?m=1';
                  </script>";
        }
        else{
        $sql="select * from usuarios where usuario=? and contraseña=?";
        $stmt=$this->dbh->prepare($sql);
        if ($stmt->execute(array($_POST['login'],$_POST['pass']))) 
        {
            if($stmt->rowCount()==0)
                {
                    echo "<script type='text/javascript'>
                    window.location='index.php?m=2';
                    </script>";
                }
                else
                {
                    while($row=$stmt->fetch())
                    {
                        $_SESSION['session_user']=$row['usuario'];
                        $_SESSION['session_perfil']=$row['id_perfil'];
                        echo "<script type='text/javascript'>
                        window.location='../home.php';
                        </script>";
                    }
                }
            }
        }
    }
    public function consulta_id()
    {
        $sql="select * from perfiles where id_perfil=?";

        $stmt=$this->dbh->prepare($sql);
        if($stmt->execute(array($_SESSION['session_perfil'])))
        {
            while($row=$stmt->fetch())
            {
                $this->perfil[]=$row;
            }
            return $this->perfil;
            $this->dbh=null;
        }
    }
}
?>
