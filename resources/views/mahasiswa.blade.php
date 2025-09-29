<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <p>Nama: {{ $data['name'] }}</p>
    <p>Umur: {{ $data['my_age'] }} tahun</p>
    <p>Hobi:
        <ul>
            @foreach ($data['hobbies'] as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
    </p>
    <p>Tanggal Harus Wisuda: {{ $data['tgl_harus_wisuda'] }}</p>
    <p>Jarak hari menuju wisuda: {{ $data['time_to_study_left'] }} hari</p>
    <p>Semester saat ini: {{ $data['current_semester'] }}</p>
    <p>Cita-cita:{{ $data['future_goal'] }}</p>
    <p>Pesan: {{ $data['message'] }}</p>
</body>
</html>
