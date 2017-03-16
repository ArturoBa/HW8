<?php
    plantilla::begin();
?>

<!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Todas las im&aacute;genes
                    <small>De nuestros ususarios para t&iacute;</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <?php 
                $imagenes = cargar_imagenes();
            
                foreach($imagenes as $img){
                $dir = "fotos/{$img->id}.jpg";
                $url = base_url("");
                    if(!is_file($dir)){
                        $dir = "http://placehold.it/750x450";
                    }
                    else{
                        
                        echo <<<FOTO
                        <div class="col-md-3 portfolio-item">
                            <a href="{$url}/main/ver_foto/{$img->id}">
                            <img class="img-responsive" src="{$url}/{$dir}" alt="">
                            </a>
                        </div>
FOTO;
                        }
                }
            ?>
        </div>

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        <!-- /.row -->