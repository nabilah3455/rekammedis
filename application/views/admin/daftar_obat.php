<style>
    .judul {
        text-align: center;
        font-size: 16px;
    }

    .klinik {
        font-size: 12px;
    }
</style>

<div class="judul">
    <div>
        <b>KLINIK RUMAH SEHAT ERIADIO</b> <br>
    </div>
    Jl. Ciderum, Kec. Caringin, Bogor, Jawa Barat <br>
    Telp : (+62) 251 8240975
</div>
<hr>
<div class="judul">
    <h3><?= $title ?></h3>
</div>
<table width="100%" border="1" cellspacing="0" class="klinik">
    <tr align="center">
        <th width="1%">No.</th>
        <th width="13%">Kode Obat</th>
        <th width="20%">Nama Obat</th>
        <th width="10%">Kategori</th>
        <th width="7%">Stok</th>
        <th width="13%">Satuan</th>
        <th width="18%">Deskripsi</th>
        <th>Tanggal Masuk</th>
    </tr>
    <?php $no = 1;
    foreach ($item as $i) { ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $i['kode_obat'] ?></td>
            <td><?= $i['nama_obat'] ?></td>
            <td align="center"><?= $i['kategori'] ?></td>
            <td align="center"><?= $i['stok'] ?></td>
            <td align="center"><?= $i['satuan'] ?></td>x
            <td><?= $i['deskripsi'] ?></td>x
            <td align="center"><?= $i['tanggal_masuk'] ?></td>
        </tr>
    <?php $no++;
    } ?>
</table>