<style>
    .judul {
        text-align: center;
        font-size: 14px;
    }

    .klinik {
        font-size: 20px;
        font-weight: 800;
    }

    table {
        font-size: 12px;
    }
</style>

<div class="judul">
    <div class="klinik">
        KLINIK RUMAH SEHAT ERIADIO <br>
    </div>
    Jl. Ciderum, Kec. Caringin, Bogor, Jawa Barat <br>
    Telp : (+62) 251 8240975
</div>
<hr>
<div class="judul">
    <h2><?= $title ?></h2>
</div>
<table width="100%" border="1" cellspacing="0">
    <tr align="center">
        <th width="1%">No.</th>
        <th width="25%">No Rekam Medis</th>
        <th width="30%">Nama Pasien</th>
        <th width="10%">Umur</th>
        <th width="25%">Alamat</th>
        <th width="20%">Kelurahan</th>
        <th width="20%">Kecamatan</th>
        <th width="20%">Provinsi</th>
        <th width="10%">Kode Pos</th>
        <th width="25%">Tanggal Masuk</th>
    </tr>
    <?php foreach ($item as $i) { ?>
        <tr>
            <td align="center"><?= $i['nomor'] ?></td>
            <td align="center"><?= $i['no_medis'] ?></td>
            <td><?= $i['nama_pasien'] ?></td>
            <td align="center"><?= $i['umur'] ?></td>
            <td><?= $i['alamat'] ?></td>
            <td><?= $i['kelurahan'] ?></td>
            <td><?= $i['kecamatan'] ?></td>
            <td><?= $i['provinsi'] ?></td>
            <td><?= $i['kode_pos'] ?></td>
            <td align="center"><?= $i['tanggal_masuk'] ?></td>
        </tr>
    <?php } ?>
</table>