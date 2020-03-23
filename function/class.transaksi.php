<?php
include_once "config.php";

class Transaksi
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    //membuat autonumber id transaksi
    public function idauto()
    {
        $query = $this->db->prepare("SELECT max(id_transaksi) as terakhir from transaksi");
        $query->execute();
        $hasil = $query->get_result();
        $data   = $hasil->fetch_assoc();
        $lastID = $data['terakhir'];
        $lastNoUrut = substr($lastID, 3);
        $nextNoUrut = $lastNoUrut + 1;
        $nextID = "TR" . sprintf("%03s", $nextNoUrut);
        return $nextID;
    }
    //menginput data paket yang akan dipilih
    public function input_paket($id_paket, $qty)
    {
        $query = $this->db->prepare("INSERT INTO temp VALUES('$id_paket','$qty')
        ON DUPLICATE KEY UPDATE id_paket = '$id_paket', qty = '$qty'");
        $query->execute();
        return true;
    }
    //menampilkan data paket yang dipilih
    public function tampil_paket()
    {
        $query = $this->db->prepare("SELECT temp.id_paket, paket.nama_paket,
         paket.harga, temp.qty, 
         (paket.harga * temp.qty) as sub_total
         FROM temp, paket
         WHERE temp.id_paket = paket.id_paket");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
    //menghapus data paket yang dipilih
    public function hapus($id_paket)
    {
        $query = $this->db->prepare("DELETE FROM temp WHERE id_paket = '$id_paket' ");
        $query->execute();
        return true;
    }
    //input transaksi ke 2 tabel(transaksi, detail transaksi)
    public function input_transaksi(
        $id_transaksi,
        $id_outlet,
        $id_member,
        $tgl,
        $batas_waktu,
        $id_paket,
        $qty,
        $sub_total,
        $keterangan,
        $id_user
    ) {
        //looping masukkan menu ke detail transaksi
        foreach ($id_paket as $key => $value) {
            $query = $this->db->prepare("INSERT INTO detail_transaksi VALUES
            (null,'$id_transaksi','$value','$qty[$key]','$sub_total[$key]','$keterangan')");
            $query->execute();
        }

        //masukkan data transaksi
        $query = $this->db->prepare("INSERT INTO transaksi VALUES
        ('$id_transaksi',$id_outlet,'','$id_member','$tgl','$batas_waktu','','','','','baru',
        'belum dibayar','$id_user')");
        $query->execute();

        //hapus data temp
        $query = $this->db->prepare("DELETE FROM temp");
        $query->execute();
        return true;
    }
    //menampilkan data transaksi di halaman pembayaran
    public function tampil_transaksi()
    {
        $query = $this->db->prepare("SELECT * FROM transaksi order by tgl desc");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
    //mengubah status transaksi(proses/selesai)
    public function update_status($id_transaksi, $status)
    {
        $query = $this->db->prepare("UPDATE transaksi SET `status` = '$status' 
        WHERE id_transaksi='$id_transaksi'");
        $query->execute();
        return true;
    }
    //mengambil id transaksi yang akan diproses(detail pembayaran)
    public function get_idtrans($id_transaksi)
    {
        $query = $this->db->prepare("SELECT * FROM transaksi WHERE transaksi.id_transaksi = '$id_transaksi'");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }    
    //menampilkan detail data transaksi (didalamnya terdapat paket yang dipilih)
    public function tampil_detail_transaksi($id_transaksi)
    {
        $query = $this->db->prepare("SELECT transaksi.id_transaksi, transaksi.id_outlet, transaksi.tgl, transaksi.id_member,
        transaksi.id_user, detail_transaksi.id_paket, paket.nama_paket, detail_transaksi.qty, detail_transaksi.sub_total 
        FROM transaksi,detail_transaksi,paket
        WHERE transaksi.id_transaksi = detail_transaksi.id_transaksi AND detail_transaksi.id_paket = paket.id_paket
        AND transaksi.id_transaksi = '$id_transaksi'");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
    //mengupdate transaksi dengan memasukkan diskon, pajak, dan status menjadi bayar
    public function pembayaran($id_transaksi, $kode_invoice, $tgl_bayar, $biaya_tambahan, $diskon, $pajak, $status, $dibayar)
    {
        $query = $this->db->prepare("UPDATE transaksi 
        SET kode_invoice = '$kode_invoice', 
        tgl_bayar = '$tgl_bayar',
        biaya_tambahan='$biaya_tambahan',
        diskon='$diskon',
        pajak='$pajak',
        `status`='diambil',
        dibayar='bayar' WHERE id_transaksi = '$id_transaksi'");
        $query->execute();
        return true;
    }
}
