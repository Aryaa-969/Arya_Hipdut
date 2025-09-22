<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <p><strong>Nama:</strong> {{ $data['name'] }}</p>
    <p><strong>Umur:</strong> {{ $data['my_age'] }} tahun</p>
    <p><strong>Hobi:</strong>
        <ul>
            @foreach ($data['hobbies'] as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
    </p>
    <p><strong>Tanggal Harus Wisuda:</strong> {{ $data['tgl_harus_wisuda'] }}</p>
    <p><strong>Jarak hari menuju wisuda:</strong> {{ $data['time_to_study_left'] }} hari</p>
    <p><strong>Semester saat ini:</strong> {{ $data['current_semester'] }}</p>
    <p><strong>Cita-cita:</strong> {{ $data['future_goal'] }}</p>
    <p><strong>Pesan:</strong> {{ $data['message'] }}</p>
</body>
</html>
