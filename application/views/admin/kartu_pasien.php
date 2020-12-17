<style>
    .judul {
        font-size: 16px;
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
    }

    .isi {
        font-size: 14px;
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<div class="judul">
    <b>KARTU PASIEN<br>RUMAH SEHAT ERIADO</b>
</div>
<hr>
<table class="isi">
    <?php foreach ($data_diri as $d) { ?>
        <tr>
            <th>Tanggal</th>
            <td style="padding-right: 4px;">:</td>
            <td><?= $d['tanggal_masuk'] ?></td>
        </tr>
        <tr style="padding-top: 3rem;">
            <th style="padding-right: 14px;">Nama/Umur</th>
            <td>:</td>
            <td><?= $d['nama_pasien'] . ' (' . $d['umur'] . ')' ?></td>
        </tr>
        <tr style="padding-top: 3rem;">
            <th>Alamat</th>
            <td>:</td>
            <td><?= $d['alamat'] ?></td>
        </tr>
    <?php } ?>
</table>
<table width="100%">
    <tr>
        <td width="80%">Keluhan :</td>
        <td>Tensi :</td>
    </tr>
    <?php foreach ($items as $i) { ?>
        <tr>
            <td><?= $i['diagnosa'] ?></td>
            <td><?= $i['tensi'] ?></td>
        </tr>
    <?php } ?>
</table>
<hr>
<table width="100%">
    <tr>
        <th>Terapi :</th>
    </tr>
    <?php foreach ($items as $i) { ?>
        <tr>
            <td colspan="2"><textarea cols="30" rows="10" style="width: 100%; height: 100px; font-family:'Times New Roman', Times, serif; font-size: 12px; line-height: 18px; border: 0px solid #dddddd; padding: 10px;"><?= $i['terapi'] ?></textarea></td>
        </tr>
    <?php } ?>
</table>