<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Distribusi Zakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .info-box {
            background-color: #e6f2ff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-row {
            background-color: #e6f2ff;
            font-weight: bold;
        }
        .note {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #17a2b8;
            margin-top: 20px;
        }
        .note ul, .note ol {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Laporan Distribusi Zakat</h1>
    
    <div class="info-box">
        <p style="text-align: center; margin: 0; font-weight: bold;">Zakat per Hak: {{ number_format($zakatPerHak, 2) }} kg beras</p>
    </div>
    
    <h2>A. Distribusi Ke Mustahik Warga</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori Mustahik</th>
                <th>Jumlah Orang</th>
                <th>Hak per Orang</th>
                <th>Total Hak</th>
                <th>Beras yang Diterima</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mustahikWarga as $mustahik)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($mustahik->kategori) }}</td>
                    <td>{{ $mustahik->jumlah_orang }}</td>
                    <td>{{ $mustahik->hak_per_orang }}</td>
                    <td>{{ $mustahik->total_hak }}</td>
                    <td>{{ number_format($mustahik->total_hak * $zakatPerHak, 2) }} kg</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data distribusi mustahik warga</td>
                </tr>
            @endforelse
            @if($mustahikWarga->count() > 0)
                <tr class="total-row">
                    <td colspan="2">Total</td>
                    <td>{{ $mustahikWarga->sum('jumlah_orang') }}</td>
                    <td>-</td>
                    <td>{{ $mustahikWarga->sum('total_hak') }}</td>
                    <td>{{ number_format($mustahikWarga->sum('total_hak') * $zakatPerHak, 2) }} kg</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    <h2>B. Distribusi Ke Mustahik Lainnya</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori Mustahik</th>
                <th>Jumlah Orang</th>
                <th>Hak per Orang</th>
                <th>Total Hak</th>
                <th>Beras yang Diterima</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mustahikLainnya as $mustahik)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($mustahik->kategori) }}</td>
                    <td>{{ $mustahik->jumlah_orang }}</td>
                    <td>{{ $mustahik->hak_per_orang }}</td>
                    <td>{{ $mustahik->total_hak }}</td>
                    <td>{{ number_format($mustahik->total_hak * $zakatPerHak, 2) }} kg</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data distribusi mustahik lainnya</td>
                </tr>
            @endforelse
            @if($mustahikLainnya->count() > 0)
                <tr class="total-row">
                    <td colspan="2">Total</td>
                    <td>{{ $mustahikLainnya->sum('jumlah_orang') }}</td>
                    <td>-</td>
                    <td>{{ $mustahikLainnya->sum('total_hak') }}</td>
                    <td>{{ number_format($mustahikLainnya->sum('total_hak') * $zakatPerHak, 2) }} kg</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    <h2>C. Rekapitulasi Distribusi Zakat</h2>
    <table>
        <tbody>
            <tr>
                <th style="width: 60%">Total Mustahik (Warga + Lainnya)</th>
                <td>{{ $mustahikWarga->sum('jumlah_orang') + $mustahikLainnya->sum('jumlah_orang') }} orang</td>
            </tr>
            <tr>
                <th>Total Hak Keseluruhan</th>
                <td>{{ $totalHakKeseluruhan }} hak</td>
            </tr>
            <tr>
                <th>Zakat per Hak</th>
                <td>{{ number_format($zakatPerHak, 2) }} kg beras</td>
            </tr>
            <tr>
                <th>Total Beras yang Didistribusikan</th>
                <td>{{ number_format($totalBerasKeseluruhan, 2) }} kg</td>
            </tr>
        </tbody>
    </table>
    
    <div class="note">
        <h3 style="margin-top: 0;">Catatan Perhitungan:</h3>
        <ol style="padding-left: 20px;">
            <li>Hak per orang ditetapkan berdasarkan kategori:
                <ul style="padding-left: 20px;">
                    <li>Fakir: 4 hak</li>
                    <li>Miskin: 3 hak</li>
                    <li>Amil, Fisabilillah, dll: 2 hak</li>
                    <li>Mampu: 0 hak</li>
                </ul>
            </li>
            <li>Total hak = Jumlah orang × Hak per orang</li>
            <li>Zakat per hak = Total beras keseluruhan ÷ Total hak keseluruhan</li>
            <li>Beras yang diterima = Total hak × Zakat per hak</li>
        </ol>
    </div>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
    </div>
</body>
</html> 