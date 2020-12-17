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
        <td width=1px>No</td>
        <td width=10px>Tanggal</td>
        <td width=80px>Nama Pasien</td>
        <td width=100px>Anamnesi/Diagnosa</td>
        <td width=100px>Terapi</td>
    </tr>
    <?php $no = 1;
    foreach ($items as $i) { ?>
        <tr>
            <td align="center"><?= $no ?></td>
            <td><?= $i['tanggal'] ?></td>
            <td><?= $i['nama_pasien'] ?></td>
            <td><?= $i['diagnosa'] ?></td>
            <td><?= $i['terapi'] ?></td>
        </tr>
    <?php $no++;
    } ?>
</table>