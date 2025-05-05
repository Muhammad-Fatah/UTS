<?php
// Sesuai dengan soal: array asosiatif PHP
$daftar_pesanan = [
    ['nama' => 'Pak Rudi', 'tanggal' => '2025-05-10'],
    ['nama' => 'Bu Sari', 'tanggal' => '2025-05-10'],
    ['nama' => 'Pak Dani', 'tanggal' => '2025-05-10'],
    ['nama' => 'Bu Lilis', 'tanggal' => '2025-05-10'],
    ['nama' => 'Pak Doni', 'tanggal' => '2025-05-10'],
    ['nama' => 'Bu Nia',  'tanggal' => '2025-05-10'],
    // Data tambahan pak roni
    ['nama' => 'Pak Roni', 'tanggal' => '2025-05-10'],
    ['nama' => 'Pak Joko', 'tanggal' => '2025-05-11'],
    // Data tambahan
    ['nama' => 'Bu Tini', 'tanggal' => '2025-05-11'],
    ['nama' => 'Pak Agus', 'tanggal' => '2025-05-11'],
    ['nama' => 'Bu Rina', 'tanggal' => '2025-05-12'],
    ['nama' => 'Pak Budi', 'tanggal' => '2025-05-12'],
    ['nama' => 'Bu Siti', 'tanggal' => '2025-05-12'],
    
];

// Fungsi untuk menjadwalkan pesanan ke tukang
function jadwalkanService($pesanan) {
    $tukang = ['Andi', 'Budi', 'Alex'];
    $jadwal = [];

    foreach ($pesanan as $p) {
        $tanggal = $p['tanggal'];
        $nama_pelanggan = $p['nama'];

        // Inisialisasi tanggal jika belum ada
        if (!isset($jadwal[$tanggal])) {
            $jadwal[$tanggal] = [];
        }

        // Hitung total yang sudah dijadwalkan di tanggal itu
        $jumlah_total = 0;
        foreach ($jadwal[$tanggal] as $daftar) {
            $jumlah_total += count($daftar);
        }

        // Jika sudah penuh 6 pelanggan, skip
        if ($jumlah_total >= 6) continue;

        // Cari tukang yang masih bisa menerima
        foreach ($tukang as $t) {
            if (!isset($jadwal[$tanggal][$t])) {
                $jadwal[$tanggal][$t] = [];
            }

            if (count($jadwal[$tanggal][$t]) < 2) {
                $jadwal[$tanggal][$t][] = $nama_pelanggan;
                break;
            }
        }
    }

    return $jadwal;
}

// Cetak hasil penjadwalan
function cetakJadwal($jadwal) {
    foreach ($jadwal as $tanggal => $data_tukang) {
        echo "Tanggal: $tanggal<br>";
        foreach ($data_tukang as $nama_tukang => $pelanggans) {
            foreach ($pelanggans as $pelanggan) {
                echo "- $nama_tukang : $pelanggan<br>";
            }
        }
        echo "<br>";
    }
}

// Jalankan dan tampilkan
$jadwal = jadwalkanService($daftar_pesanan);
cetakJadwal($jadwal);
?>
