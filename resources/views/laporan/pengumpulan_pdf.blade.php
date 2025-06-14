<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengumpulan Zakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
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
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            width: 40%;
        }
        .note {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #17a2b8;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .total-row {
            background-color: #e6f2ff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Laporan Pengumpulan Zakat</h1>
    
    <table>
        <tbody>
            <tr>
                <th>Total Muzakki</th>
                <td>{{ $totalMuzakki }} orang</td>
            </tr>
            <tr>
                <th>Total Jiwa (Tanggungan)</th>
                <td>{{ $totalJiwa }} orang</td>
            </tr>
            <tr>
                <th>Total Beras</th>
                <td>{{ number_format($totalBeras, 2) }} kg</td>
            </tr>
            <tr>
                <th>Total Uang</th>
                <td>Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Beras dari Uang</th>
                <td>{{ number_format($totalBerasDariUang, 2) }} kg</td>
            </tr>
            <tr class="total-row">
                <th>Total Beras Keseluruhan</th>
                <td>{{ number_format($totalBerasKeseluruhan, 2) }} kg</td>
            </tr>
        </tbody>
    </table>
    
    <div class="note">
        <p><strong>Catatan:</strong> Konversi uang ke beras menggunakan harga Rp 35.000 per 2,5 kg beras (Rp 14.000 per kg)</p>
    </div>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
    </div>
</body>
</html> 