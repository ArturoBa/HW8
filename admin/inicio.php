<?php
    plantilla::begin();
    $CI =& get_instance();

    if($_POST){    
    
        $f = new stdClass();
        $f->nombre = $_POST["nombre"];
        $f->comentario = $_POST["comentario"];
        $f->fecha = time();
        
        $CI->db->insert("imagenes", $f);
        
        $cod = $this->db->insert_id();
        
        
        $foto = $_FILES["foto"];
        
        if($foto["error"] == 0){
            $tmp = "fotos/{$cod}.jpg";
            move_uploaded_file($foto["tmp_name"], $tmp);
        }
    }
?>

<div class="text-right">
    <a href="<?php echo base_url('admin/salir'); ?>" class="btn btn-danger">Salir</a>
</div>

<fieldset>
    <legend>Agregar im&aacute;gen</legend>
    <form enctype="multipart/form-data" method="post" action="">
        <div class="col col-sm-4">
        
            <div class="form-group input-group">
                    <label class="input-group-addon">Nombre: </label>
                    <input type="text" required name="nombre" class="form-control"/>
                </div>

            <div class="form-group input-group">
                    <label class="input-group-addon">Comentario: </label>
                    <textarea name="comentario" class="form-control"></textarea>
                </div>

            <div class="form-group input-group">
                    <label class="input-group-addon">Imagen: </label>
                    <input type="file" name="foto" required class="input-control"/>
                </div>
            
            <div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            
        </div>
    </form>
</fieldset>
<br/>
<fieldset>
    <legend>Tus im&aacute;genes</legend>
    
    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Cod</th>
                <th>Nombre</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $imagenes = cargar_imagenes();
            
            foreach($imagenes as $img){
                echo "<tr>
                <td><img src='fotos/{$img->id}.jpg' height='100'/></td>
                <td>{$img->id}</td>
                <td>{$img->nombre}</td>
                <td>{$img->comentario}</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</fieldset>