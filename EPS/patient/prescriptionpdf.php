<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription PDF</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        tr {
            border-bottom: 1px solid #ddd;
        }
        td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: left;
        }
        .section-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #f4f4f4;
            border-top: 2px solid #ddd;
            width: 100%; /* Ensure the container is wide enough */
        }
        .signature-section p {
            margin: 0;
        }
        .signature-section .stamp {
            text-align: right;
        }
        .signature-section .signature {
            text-align: left;
        }
        .read-only-info {
            font-size: 0.8em;
            color: grey;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; color: #4CAF50;">Prescription Details</h1>
    <div class="read-only-info">
        <p>Address: 0000 Robert Street</p>
        <p>VAT No.: 00001111</p>
        <p>Email: hospital@gmail.co.zw</p>
        <p>Contact Number: +263 (029) 1112223</p>
    </div>
    <div>
        <p class="section-title">Consultant Information</p>
        <table>
            <tr>
                <th>Consultant:</th>
                <td><?=$prescriptions['consult']?></td>
            </tr>
            <tr>
                <th>National ID:</th>
                <td><?=$prescriptions['national_id']?></td>
            </tr>
            <tr>
                <th>Visit Date:</th>
                <td><?=$prescriptions['vdate']?></td>
            </tr>
            <tr>
                <th>Review Date:</th>
                <td><?=$prescriptions['cdate']?></td>
            </tr>
        </table>
    </div>
    <div>
        <p class="section-title">Case Details</p>
        <table>
            <tr>
                <th>Case:</th>
                <td><?=$prescriptions['situation']?></td>
            </tr>
            <tr>
                <th>Advise:</th>
                <td><?=$prescriptions['advise']?></td>
            </tr>
            <tr>
                <th>Tests:</th>
                <td><?=$prescriptions['test']?></td>
            </tr>
            <tr>
                <th>Medication:</th>
                <td><?=$prescriptions['med']?></td>
            </tr>
            <tr>
                <th>Feeding Rules:</th>
                <td><?=$prescriptions['frules']?></td>
            </tr>
            <tr>
                <th>Feeding Days:</th>
                <td><?=$prescriptions['fdays']?></td>
            </tr>
            <tr>
                <th>Pharmacy:</th>
                <td><?=$prescriptions['phar']?></td>
            </tr>
        </table>
    </div>
    
    <div class="signature-section">
        <div class="signature">
            <p>Signature: ___________________________</p>
        </div>
        <div class="stamp">
            <p>Stamp: ___________________________</p>
        </div>
    </div>
</body>
</html>
