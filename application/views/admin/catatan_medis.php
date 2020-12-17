<style>
    .judul {
        text-align: center;
        font-size: 20px;
        font-weight: 800;
    }

    .klinik {
        font-size: 24px;
        font-weight: 800;
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
    <?= $title ?>
</div>
<table width="100%">
    <?php foreach ($item as $i) { ?>
        <tr>
            <td width="23%"></td>
            <td width="50%"></td>
            <!-- <td>Nama Peserta Akses :</td> -->
        </tr>
        <tr>
            <td>No.Rec.Medis</td>
            <td>: <?= $i['no_medis'] ?></td>
            <!-- <td><u><?= $i['nama_pasien'] ?></u></td> -->
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td colspan="2">: <?= $i['nama_pasien'] ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td colspan="2">: <?= $i['umur'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td colspan="2">: <?= $i['alamat'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Daftar</td>
            <td colspan="2">: <?= $i['tanggal_daftar'] ?></td>
        </tr>
    <?php } ?>
</table>
<table width="100%" border="1" cellspacing="0">
    <tr align="center">
        <th width="10%">Tanggal</th>
        <th width="25%">Anamnese/Diagnosa</th>
        <th width="25%">Terapi</th>
        <!-- <th>Tanggal Masuk</th> -->
    </tr>
    <?php foreach ($medis as $i) { ?>
        <tr>
            <td align="center"><?= $i['tanggal'] ?></td>
            <td><?= $i['diagnosa'] ?></td>
            <td><?= $i['terapi'] ?></td>
        </tr>
    <?php } ?>
</table>