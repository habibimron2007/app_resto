<?php
    session_start();
    include "config/classDB.php";
    if(!empty($_SESSION['cart'])){
        //simpan ke tabel orders
        $insertOrder = $dbo->insert("tblorders(idorder,idpelanggan,tgl_order)", "null,".$_SESSION['iduser'].",now()");
        $idorder = $dbo->lastInsert();
        if($insertOrder){
            //simpan ke order detail
            foreach($_SESSION['cart'] as $id=>$val){
                $menu = $dbo->select('tblmenu where idmenu='.$id);
                foreach($menu as $row){

                }
                $harga = $row['harga'];
                $insertDetail = $dbo->insert("tblorderdetail","null,'$idorder',$id,$val,$harga,''");
                unset($_SESSION['cart'][$id]);
            }
        }
    }
?>
<script>
    location.href='index.php';
</script>