<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Laporan - Masjid - SISTEM INFROMASI BANTUAN HIBAH</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /* border: 2px solid #eee; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        #project {
            float: left;
        }

        #company {
            float: right;
        }

        table.tblcms2 {
            clear: both;
            width: 100%;
            padding: 0;
            margin: 10px auto;
            font-size: 12px;
            text-align: left;
            background: #eee;
            border-collapse: collapse;
            border: 1px solid #ccc;
            font-family: sans-serif, "Lucida Sans Unicode", "Lucida Grande", Georgia, "Times New Roman", Times, serif;
        }

        table.tblcms2 th {
            height: 15px;
            text-align: center;
            padding: 3px 3px;

        }

        table.tblcms2 td,
        th {
            height: 15px;
            vertical-align: middle;
            border: 1px solid #ccc;
        }

        table.tblcms2 td {
            font-family: Tahoma, "Trebuchet MS";
            font-size: 12px;
        }

        table.tblcms2 td.clcenter {
            text-align: center;
        }

        table.tblcms2 td a {
            color: #4E4D4D;
        }

        table.tblcms2 th {
            /*background: #e5e5e5;*/
            background: #4C78A6;
            color: #FFF;

        }

        table.tblcms2 td a:hover,
        table.tblcms22 td a:hover {
            color: #814000;
            text-decoration: underline;
        }

        table.tblcms2 tr:hover {
            background: none repeat scroll 0 0 #def1f3;
            text-decoration: none;
        }

        table.tblcms2 th.sorted {
            background-color: #DDDDDD;
            background-image: none;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="invoice-box">

        <table cellpadding="0" cellspacing="0">
            <caption>
                <img src="{{ asset('backend') }}/log.png" class="center" style="width: 100%; max-width: 100px">
            </caption>
            {{-- <caption>
                <br>
                <h2>KOMISI PEMILIHAN UMUM KOTA JAMBI</h2>
            </caption> --}}
            {{-- Table --}}
            <table width="100%" class="tblcms2">
                <thead>
                    <tr>
                        <th colspan="5" align="center">Laporan Data Masjid<strong></strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="th_border cell">No</th>
                        <!--h <th class="th_border cell">Id Admin </th> h-->
                        <th align="center" class="th_border cell">Masjid</th>
                        <th align="center" class="th_border cell">Id</th>
                        <th align="center" class="th_border cell">Alamat</th>
                        <th align="center" class="th_border cell">Bantuan Diterima</th>
                    </tr>
                </tbody>
                <tbody>
                    @foreach ($all as $item)
                        <tr class="event2">
                            <td align="center" width="50">{{ $loop->iteration }}</td>
                            <td align="center" class="th_border cell">{{ $item->nama }}</td>
                            <td align="center" class="th_border cell">{{ $item->id_masjid }}</td>
                            <td align="center" class="th_border cell">{{ $item->kabko }}, {{ $item->lokasi }}</td>
                            <td align="center" class="th_border cell">Rp. {{ number_format($item->acc) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- End Table --}}
            </table>
    </div>
</body>

</html>
