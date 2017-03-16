<?php 
    plantilla::begin();

$CI =& get_instance();
$sql = "select * from imagenes where id = ?";

$rs = $CI->db->query($sql, array($cod));
$rs = $rs->result();

if(count($rs) == 0){
    redirect("main");
}

$img  = $rs[0];
?>

<div class="text-center">
    <h1><?php echo $img->nombre; ?></h1>
    <img class="img-responsive" src="<?php echo base_url("fotos/{$img->id}.jpg"); ?>"/>
</div>

<div class="text-center">
    <h2><?php echo $img->comentario; ?></h2>
</div>