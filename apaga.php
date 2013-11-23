<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Deletando diretórios</title>
</head>

<body>
<?php
function ExcluiDir($Dir){
    
    if ($dd = opendir($Dir)) {
        while (false !== ($Arq = readdir($dd))) {
            if($Arq != "." && $Arq != ".."){
                $Path = "$Dir/$Arq";
                if(is_dir($Path)){
                    ExcluiDir($Path);
                }elseif(is_file($Path)){
                    unlink($Path);
                }
            }
        }
        closedir($dd);
    }
    rmdir($Dir);
}


$pasta = $_POST['pasta'];
ExcluiDir($pasta);


if(is_dir($pasta)) {
	echo"<script>alert('Falha ao excluir.');</script>";
}
else {
	echo"<script>alert('Diretório Excluído  com Sucesso!');</script>";
}
?>


</body>
</html>
