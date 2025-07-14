<?php 
    include '../../config/db.php';
    
    function tglHelper($tanggal){
    $hariMasuk= $tanggal;
    
    $jatuhTempo= date('d-m-Y', strtotime($hariMasuk. ' + 30 days'));
    return array(
        'masuk'=> $hariMasuk,
        'tambahSebulan'=> $jatuhTempo,
        );
    }


    if(isset($_POST['reservasi'])){
        $i = 1;
        $id = $_POST['id'];
        $id_user = $_POST['id_user'];
        $harga = $_POST['harga'];
        $id_kamar = $_POST['id_kamar'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $updateReservasi = $conn->query("UPDATE reservasi SET durasi='$startDate', terbayar='$endDate', status='Terkonfirmasi'  WHERE id = '$id' ");
        
        if($updateReservasi){
            $conn->query("UPDATE kamar SET status='terisi' WHERE id = '$id_kamar' ");
            $data = array();
            $tanggal= date('d-m-Y');
            while ($i <= $startDate) {
                $tg = $i == 1 ? $tanggal: (tglHelper($data[$i-1]['bulan']))['tambahSebulan'];
                $masuk =tglHelper($tg)['masuk'];
                $tempo =tglHelper($tg)['tambahSebulan'];
                $data[$i]=[ 
                    'id_user'=> $id_user,
                    'tagihan'=> $harga,
                    'bulan'=> $masuk,
                    'jatuh_tempo'=> $tempo,
                    'status'=> $i <= $endDate ? 'lunas' : 'belum lunas',];
                $i++;
            } 
            foreach($data as $tagihan){
                $stmt= $conn->prepare("INSERT INTO tagihan (id_user, tagihan, bulan, jatuh_tempo, status) VALUES (?,?,?,?,?)");
                $stmt->bind_param("issss",$tagihan['id_user'], $tagihan['tagihan'], $tagihan['bulan'], $tagihan['jatuh_tempo'], $tagihan['status']);
                $stmt->execute();
            }
            $stmt->close();
            $conn->close();
            echo "<script>alert('Success');window.location.href='../../admin/reservasi'</script>";
        }

    }

?>