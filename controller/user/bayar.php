<?php 
    require '../../config/db.php';
    
    if(isset($_POST['bayar'])){
        $payment= $_POST;
       try {
        $lunas = 'lunas';
        $conn->begin_transaction();
        $stmt=$conn->prepare("INSERT INTO payment 
        (id_user,id_reservasi,nama,bulan,jatuh_tempo,metode,harga)
        Values (?,?,?,?,?,?,?)
        ");
        $stmt->bind_param('iisssss',$payment['id_user'], $payment['id_reservasi'], $payment['nama'],$payment['bulan'], $payment['jatuh_tempo'], $payment['metode'],$payment['jumlah']);
        $stmt->execute();

        $stmtTagihan = $conn->prepare("UPDATE tagihan SET status= ? WHERE id=? ");
        $stmtTagihan->bind_param('si',$lunas,$payment['id_reservasi'] );
        $stmtTagihan->execute();

        $conn->commit();
        echo "<script>window.location.href='../../user/tagihan'</script>";
       } catch (Exception $e) {
        $conn->rollback();
        echo "Failed". $e->getMessage();
       }
    }
    
?>