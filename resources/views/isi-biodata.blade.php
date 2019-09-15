<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Isi Biodata</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    @if (\Session::has('alert'))
    <p>{!! \Session::get('alert') !!}</p>
    @endif
    <form method="POST">
        {{csrf_field()}}
        <label>Pilih jenis kelamin:<br>
            <select name="jenis_kelamin" required>
                <option value="" disabled
                <?php
                if(!isset($data_mahasiswa)) {
                    echo "selected";
                }
                ?>
                >Pilih jenis kelamin</option>

                <?php
                $array_jenis_kelamin = ['Laki-laki', 'Perempuan'];
                foreach ($array_jenis_kelamin as $key => $value) {
                    $isSelected = ($value == $data_mahasiswa['jenis_kelamin'] ? 'selected' : '');
                    echo "<option value=\"{$key}\" {$isSelected}>{$value}</option>";
                }
                ?>
            </select>
        </label><br>
        <label>Pilih agama:<br>
            <select name="agama" required>
                <option value="" disabled
                <?php
                if(!isset($data_mahasiswa)) {
                    echo "selected";
                }
                ?>
                >Pilih agama</option>

                <?php
                $array_agama = ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu'];
                foreach ($array_agama as $key => $value) {
                    $isSelected = ($value == $data_mahasiswa['agama'] ? 'selected' : '');
                    echo "<option value=\"{$key}\" {$isSelected}>{$value}</option>";
                }
                ?>
            </select>
        </label><br>
        <label>Alergi obat/makanan:<br>
            <input name="alergi_makanan" type="text" placeholder="Masukkan alergi obat/makanan"
            <?php
                if(isset($data_mahasiswa)) {
                    echo "value=\"{$data_mahasiswa->alergi_makanan}\"";
                }
            ?>
            ><br>
            * Kosongi jika tidak ada
        </label><br>
        <label>Riwayat penyakit:<br>
            <input name="riwayat_penyakit" type="text" placeholder="Masukkan riwayat penyakit"
            <?php
                if(isset($data_mahasiswa)) {
                    echo "value=\"{$data_mahasiswa->riwayat_penyakit}\"";
                }
            ?>
            ><br>
            * Kosongi jika tidak ada
        </label><br>
        <input type="submit" value="Masukkan">
    </form>
</body>

</html>