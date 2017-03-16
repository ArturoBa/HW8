<?php
        $message = "";
    if($_POST){
        $sql = "select * from users where email=? and contrasena = ?";
        
        $CI =& get_instance();
        $email = $_POST['email'];
        $pass = md5($_POST['contrasena']);
        
        $rs = $CI->db->query($sql, array($email, $pass));
        $rs = $rs->result();
        
        if($rs > 0){
            $_SESSION['gale_user'] = $rs[0];
            redirect("admin");
        }
        else{
            $message = "Email o clave no v&aacute;lido";
        }
    }

    plantilla::begin();
?>
<h3>Reg&iacute;strate</h3>

<div class="row">
    <div class="col col-sm-4 col-sm-offset-4">
        <form method="post" action="">
            <div class="form-group input-group">
                <label class="input-group-addon">Email: </label>
                <input type="text" name="email" class="form-control"/>
            </div>
            
            <div class="form-group input-group">
                <label class="input-group-addon">Clave: </label>
                <input type="password" name="contrasena" class="form-control"/>
            </div>
            
            <div style="color: red">
                <?php echo $message; ?>
            </div>
            
            <div class="text-center">
                <button class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>

</div>