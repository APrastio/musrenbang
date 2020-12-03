<center>
    <h3>HASIL KESEPAKATAN MUSRENBANG <br> KOTA TANGERANG SELATAN <br> KECAMATAN <?= strtoupper($musrenbang['kecamatan']) ?> TAHUN <?= date('yy', $musrenbang['date']) ?></h3>
</center>

<table border="1" style="border-spacing: 0;" width="100%">
    <tr>
        <th colspan="1" width="25%" style="text-align:left; padding-left:8px">
            Kecamatan
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= ucfirst($musrenbang['kecamatan']) ?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Tgl/Bln/Tahun
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= date('d-m-yy', $musrenbang['date']) ?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Jenis Kegiatan
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= ucfirst($musrenbang['jenis_kegiatan']) ?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Sasaran
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= ucfirst($musrenbang['sasaran']) ?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Keterangan Sasaran
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= ucfirst($musrenbang['keterangan']) ?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Volume
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= $musrenbang['volume'] ?> &#13221
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Lokasi
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            <?= ucfirst($musrenbang['lokasi']) ?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align:left; padding-left:8px">
            Biaya
        </th>
        <td colspan="2" style="text-align:left; padding-left:8px">
            Rp.<?= number_format($musrenbang['biaya'], 2, ",", "."); ?>
        </td>
    </tr>
    <?php if ($status > 0) : ?>
        <tr>
            <?php if ($status['status'] == 'Disetujui') : ?>
                <th colspan="3" style="background-color:#99fc81">
                    <h3>Disetujui</h3>
                </th>
            <?php elseif ($status['status'] == 'Tidak Terkait') : ?>
                <th colspan="3" style="background-color:#f5e98e">
                    <h3>Tidak Terkait</h3>
                </th>
            <?php elseif ($status['status'] == 'Tidak Disetujui') : ?>
                <th colspan="3" style="background-color:#f77e7e">
                    <h3>Tidak Disetujui</h3>
                </th>
            <?php endif; ?>
        </tr>
    <?php endif; ?>

</table>