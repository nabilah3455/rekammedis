<style>
    .judul {
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    .klinik {
        font-size: 24px;
        font-weight: 800;
    }

    .subjudul {
        text-align: center;
        padding-top: 5px;
        padding-bottom: 2rem;
    }

    .ttd {
        padding-top: 6rem;
        text-align: right;
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
<div class="subjudul">
    SURAT RUJUKAN PESERTA
</div>
<?php foreach ($items as $i) { ?>
    <table style="border-style: ridge;" width=100%>
        <tr>
            <th width="20%">Dokter Keluarga</th>
            <td width="2%">:</td>
            <td width=40%>Klinik Rumah Sehat Eriado</td>
            <th>No.Rec.Medis</th>
            <td width="2%">:</td>
            <td><?= $i['no_medis'] ?></td>
        </tr>
        <tr>
            <th>Kabupaten/Kota</th>
            <td>:</td>
            <td>Bogor</td>
        </tr>
    </table>

    <table style="padding-top: 1rem;" width="100%">
        <tr>
            <th width=28%>Kepada Yth. TS dr. Poli</th>
            <th width=2%>:</th>
            <td><?= $i['nama_poli'] ?></td>
        </tr>
        <tr>
            <th>Di RSU</th>
            <th>:</th>
            <td><?= $i['nama_rumah_sakit'] ?></td>
        </tr>
        <tr>
            <th colspan="3">Mohon pemeriksaan dan penanganan lebih lanjut penderita :</th>
        </tr>
        <tr>
            <th>Nama</th>
            <th>:</th>
            <td><?= $i['nama_pasien'] ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <th>:</th>
            <td><?= $i['umur'] ?> Tahun</td>
        </tr>
        <tr>
            <th>Diagnosa</th>
            <th>:</th>
            <td><?= $i['diagnosa'] ?></td>
        </tr>
        <tr>
            <th colspan="3">Demikian atas bantuannya, diucapkan banyak terimakasih.</th>
        </tr>
        <tr>
            <th colspan="3">Salam sejawat, <?= $i['tanggal'] ?> </th>
        </tr>
        <tr>
            <th colspan="3" class="ttd">(<?= $i['dokter'] ?>)</th>
        </tr>
    </table>
<?php } ?>