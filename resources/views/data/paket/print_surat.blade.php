<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 15">
    <link rel="stylesheet" href="{{ asset('/') }}css/print.css">
    <link href="{{ url('/dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}css/all_print.css" rel="stylesheet">
</head>

<body link="#0563C1" vlink="#954F72">

    <table border=0 cellpadding=0 cellspacing=0 width=563 style='border-collapse:collapse;table-layout:fixed;width:422pt'>
        <col width=68 style='mso-width-source:userset;mso-width-alt:2176;width:51pt'>
        <col width=83 style='mso-width-source:userset;mso-width-alt:2645;width:62pt'>
        <col width=97 style='mso-width-source:userset;mso-width-alt:3114;width:73pt'>
        <col width=51 span=2 style='mso-width-source:userset;mso-width-alt:1621;width:38pt'>
        <col width=104 style='mso-width-source:userset;mso-width-alt:3328;width:78pt'>
        <col width=109 style='mso-width-source:userset;mso-width-alt:3498;width:82pt'>
        <tr height=29 style='mso-height-source:userset;height:22.0pt'>
            <td height=29 class=xl71 width=68 style='height:22.0pt;width:51pt'>
                <font class="font6">ORIGIN</font>
                <font class="font5"><br>
                    {{ strtoupper($wilayahKustomer[0]) }}
                </font>
            </td>
            <td class=xl72 width=83 style='border-left:none;width:62pt'>
                <font class="font6">TUJUAN</font>
                <font class="font5"><br>
                    {{ strtoupper($paket[0]->kota_tujuan) }}
                </font>
            </td>
            <td rowspan=3 class=xl73 width=97 style='border-bottom:.5pt solid black;
  width:73pt'>No. STT<br>
                <font class="font5">{{ $paket[0]->no_stt }}</font>
            </td>
            <td rowspan=3 class=xl74 width=51 style='border-bottom:.5pt solid black;
  width:38pt'><img src="http://tracking.titipanexpress.co.id/assets/images/tema-logo.png" width="100%"></td>
            <td colspan=3 class=xl75 width=264 style='border-right:1.0pt solid black;
  width:198pt'>
                <font class="font7">PT. TITIPAN EXPRESS UTAMA</font>
                <font class="font5"><br>
                </font>
                <font class="font8">Domestic &amp; Int'l Cargo &amp; Jabodetabek
                    Courier Service</font>
            </td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td rowspan=2 height=42 class=xl77 style='border-bottom:.5pt solid black;
  height:32.0pt;border-top:none'>Item <font class="font5">: {{ $fisik[0]->koli }}</font>
                <font class="font6"> </font>
                <font class="font5">Koli</font>
            </td>
            <td class=xl119 style='border-top:none;border-left:none'>Berat <font class="font5">: {{ $fisik[0]->berat }} Kg</font>
            </td>
            <td class=xl70>Kantor Pusat:</td>
            <td colspan=2 rowspan=2 class=xl66 width=213 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:160pt'>Jl. Kali Besar Timur III No.7
                Pinangsia, Taman Sari, Jakarta Barat<br>
                Telp : (021) 6918393, 6917654, 70783218, Fax : (021) 6918393<br>
                E-mail : info@titipanexpress.co.id<span style='mso-spacerun:yes'> </span></td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td height=21 class=xl118 style='height:16.0pt;border-top:none;border-left:
  none'>
                <font class="font6">Volume </font>
                <font class="font5">: {{ $fisik[0]->panjang * $fisik[0]->lebar * $fisik[0]->tinggi }} cm<span style="font-size: 7px; transform: translateY(-3px); display: inline-block;">3</span></font>
            </td>
            <td class=xl83>&nbsp;</td>
        </tr>
        <tr height=63 style='mso-height-source:userset;height:47.0pt'>
            <td colspan=2 height=63 class=xl84 width=151 style='border-right:.5pt solid black;
  height:47.0pt;width:113pt'>
                <font class="font6">Pengiriman </font>
                <font class="font5">: <br>
                    {{ strtoupper($paket[0]->kustomer) }}
                </font>
            </td>
            <td colspan=3 rowspan=5 class=xl86 width=199 style='border-right:.5pt solid black;
  width:149pt'>
                <font class="font6">Penerima </font>
                <font class="font5">: {{ strtoupper($paket[0]->tujuan) }}<br>
                    {{ strtoupper($paket[0]->alamat_penerima) }}
                </font>
                <br><br><br><br><br><br><br><br><br>
                <center>
                    <h1><b>KEMBALI {{ strtoupper($expWilayah[0]) }}</b></h1>STT Harap di stempel dan tanda tangan jelas
                </center>
            </td>
            <td colspan=2 rowspan=5 class=xl89 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black'>{{ $qrCode }}</td>
        </tr>
        <tr height=21 style='mso-height-source:userset;height:16.0pt'>
            <td colspan=2 rowspan=11 height=198 class=xl86 width=151 style='border-bottom:
  1.0pt solid black;height:150.0pt;width:113pt'>
                <font class="font6">Keterangan</font>
                <font class="font5"> : <br>
                    <br>
                    {{ strtoupper($fisik[0]->keterangan) }}
                </font>
            </td>
        </tr>
        <tr height=21 style='height:16.0pt'>
        </tr>
        <tr height=21 style='height:16.0pt'>
        </tr>
        <tr height=21 style='height:16.0pt'>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td colspan=3 height=21 class=xl98 style='border-right:.5pt solid black;
  height:16.0pt'>{{ strtoupper($paket[0]->kota_tujuan) }}</td>
            <td colspan=2 class=xl101 style='border-right:1.0pt solid black;border-left:
  none'>{{ date('d-M-Y', strtotime($cost[0]->tanggal_pickup)) }}</td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td height=21 class=xl103 style='height:16.0pt'>DITERIMA OLEH</td>
            <td colspan=2 class=xl103 style='border-right:.5pt solid black'>DITANGANI OLEH</td>
            <td rowspan=2 class=xl104 style='border-bottom:.5pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ strtolower($paket[0]->tipe_paket) == 'barang' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>BARANG</span>
                </div>
            </td>
            <td rowspan=2 class=xl104 style='border-bottom:.5pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->pelayanan == 'harga_normal' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>NORMAL</span>
                </div>
            </td>
        </tr>
        <tr height=8 style='mso-height-source:userset;height:6.0pt'>
            <td rowspan=5 height=72 class=xl107 style='border-bottom:1.0pt solid black;
  height:54.0pt'>Nama Jelas & Stempel</td>
            <td colspan=2 rowspan=4 class=xl107 style='border-right:.5pt solid black'>
                <img src='http://newtema.picloud.id/assets/ttd.jpeg' width=100%>
            </td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td rowspan=2 height=28 class=xl104 style='border-bottom:.5pt solid black;
  height:21.0pt;border-top:none'>
                <div class="div-checkbox">
                    <i class="far {{ strtolower($paket[0]->tipe_paket) == 'dokumen' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>DOKUMEN</span>
                </div>
            <td rowspan=2 class=xl104 style='border-bottom:.5pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->pelayanan == 'harga_express' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>EXPRESS</span>
                </div>
            </td>
        </tr>
        <tr height=7 style='mso-height-source:userset;height:5.0pt'>
        </tr>
        <tr height=23 style='mso-height-source:userset;height:17.0pt'>
            <td rowspan=2 height=36 class=xl104 style='border-bottom:1.0pt solid black;
  height:27.0pt;border-top:none'>
                <div class="div-checkbox">
                    <i class="far {{ strtolower($paket[0]->tipe_paket) == 'lain-lain' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>OTHERS</span>
                </div>
            </td>
            <td rowspan=2 class=xl104 style='border-bottom:1.0pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->pelayanan == 'harga_super_express' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>SUPER EXPRESS</span>
                </div>
            </td>
        </tr>
        <tr height=13 style='mso-height-source:userset;height:10.0pt'>
            <td colspan=2 height=13 class=xl114 style='border-right:.5pt solid black;
  height:10.0pt'><u>Philipus Sahat S.</u><br>General Manager</td>
        </tr>
        <tr height=23 style='height:17.0pt'>
            <td height=23 class=xl69 style='height:17.0pt'>&nbsp;</td>
            <td class=xl69>&nbsp;</td>
            <td class=xl69>&nbsp;</td>
            <td class=xl69>&nbsp;</td>
            <td class=xl69>&nbsp;</td>
            <td class=xl69>&nbsp;</td>
            <td class=xl69>&nbsp;</td>
        </tr>
        <tr height=29 style='mso-height-source:userset;height:22.0pt'>
            <td height=29 colspan=7 style='height:22.0pt;mso-ignore:colspan'></td>
        </tr>
        <![if supportMisalignedColumns]>
        <tr height=0 style='display:none'>
            <td width=68 style='width:51pt'></td>
            <td width=83 style='width:62pt'></td>
            <td width=97 style='width:73pt'></td>
            <td width=51 style='width:38pt'></td>
            <td width=51 style='width:38pt'></td>
            <td width=104 style='width:78pt'></td>
            <td width=109 style='width:82pt'></td>
        </tr>
        <![endif]>
    </table>

    <table border=0 cellpadding=0 cellspacing=0 width=563 style='border-collapse:collapse;table-layout:fixed;width:422pt'>
        <col width=68 style='mso-width-source:userset;mso-width-alt:2176;width:51pt'>
        <col width=83 style='mso-width-source:userset;mso-width-alt:2645;width:62pt'>
        <col width=97 style='mso-width-source:userset;mso-width-alt:3114;width:73pt'>
        <col width=51 span=2 style='mso-width-source:userset;mso-width-alt:1621;width:38pt'>
        <col width=104 style='mso-width-source:userset;mso-width-alt:3328;width:78pt'>
        <col width=109 style='mso-width-source:userset;mso-width-alt:3498;width:82pt'>
        <tr height=29 style='mso-height-source:userset;height:22.0pt'>
            <td height=29 class=xl71 width=68 style='height:22.0pt;width:51pt'>
                <font class="font6">ORIGIN</font>
                <font class="font5"><br>
                    {{ strtoupper($wilayahKustomer[0]) }}
                </font>
            </td>
            <td class=xl72 width=83 style='border-left:none;width:62pt'>
                <font class="font6">TUJUAN</font>
                <font class="font5"><br>
                    {{ strtoupper($paket[0]->kota_tujuan) }}
                </font>
            </td>
            <td rowspan=3 class=xl73 width=97 style='border-bottom:.5pt solid black;
  width:73pt'>No. STT<br>
                <font class="font5">{{ $paket[0]->no_stt }}</font>
            </td>
            <td rowspan=3 class=xl74 width=51 style='border-bottom:.5pt solid black;
  width:38pt'><img src="http://tracking.titipanexpress.co.id/assets/images/tema-logo.png" width="100%"></td>
            <td colspan=3 class=xl75 width=264 style='border-right:1.0pt solid black;
  width:198pt'>
                <font class="font7">PT. TITIPAN EXPRESS UTAMA</font>
                <font class="font5"><br>
                </font>
                <font class="font8">Domestic &amp; Int'l Cargo &amp; Jabodetabek
                    Courier Service</font>
            </td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td rowspan=2 height=42 class=xl77 style='border-bottom:.5pt solid black;
  height:32.0pt;border-top:none'>Item <font class="font5">: {{ $fisik[0]->koli }}</font>
                <font class="font6"> </font>
                <font class="font5">Koli</font>
            </td>
            <td class=xl119 style='border-top:none;border-left:none'>Berat <font class="font5">: {{ $fisik[0]->berat }} Kg</font>
            </td>
            <td class=xl70>Kantor Pusat:</td>
            <td colspan=2 rowspan=2 class=xl66 width=213 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:160pt'>Jl. Kali Besar Timur III No.7
                Pinangsia, Taman Sari, Jakarta Barat<br>
                Telp : (021) 6918393, 6917654, 70783218, Fax : (021) 6918393<br>
                E-mail : info@titipanexpress.co.id<span style='mso-spacerun:yes'> </span></td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td height=21 class=xl118 style='height:16.0pt;border-top:none;border-left:
  none'>
                <font class="font6">Volume </font>
                <font class="font5">: {{ $fisik[0]->panjang * $fisik[0]->lebar * $fisik[0]->tinggi }} cm<span style="font-size: 7px; transform: translateY(-3px); display: inline-block;">3</span></font>
            </td>
            <td class=xl83>&nbsp;</td>
        </tr>
        <tr height=63 style='mso-height-source:userset;height:47.0pt'>
            <td colspan=2 height=63 class=xl84 width=151 style='border-right:.5pt solid black;
  height:47.0pt;width:113pt'>
                <font class="font6">Pengiriman </font>
                <font class="font5">: <br>
                    {{ strtoupper($paket[0]->kustomer) }}
                </font>
            </td>
            <td colspan=3 rowspan=5 class=xl86 width=199 style='border-right:.5pt solid black;
  width:149pt'>
                <font class="font6">Penerima </font>
                <font class="font5">: {{ strtoupper($paket[0]->tujuan) }}<br>
                    {{ strtoupper($paket[0]->alamat_penerima) }}
                </font>
                <br><br><br><br><br><br><br><br><br>
                <center>
                    <h1><b>KEMBALI {{ strtoupper($expWilayah[0]) }}</b></h1>STT Harap di stempel dan tanda tangan jelas
                </center>
            </td>
            <td colspan=2 rowspan=5 class=xl89 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black'>{{ $qrCode }}</td>
        </tr>
        <tr height=21 style='mso-height-source:userset;height:16.0pt'>
            <td colspan=2 rowspan=11 height=198 class=xl86 width=151 style='border-bottom:
  1.0pt solid black;height:150.0pt;width:113pt'>
                <font class="font6">Keterangan</font>
                <font class="font5"> : <br>
                    <br>
                    {{ strtoupper($fisik[0]->keterangan) }}
                </font>
            </td>
        </tr>
        <tr height=21 style='height:16.0pt'>
        </tr>
        <tr height=21 style='height:16.0pt'>
        </tr>
        <tr height=21 style='height:16.0pt'>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td colspan=3 height=21 class=xl98 style='border-right:.5pt solid black;
  height:16.0pt'>{{ strtoupper($paket[0]->kota_tujuan) }}</td>
            <td colspan=2 class=xl101 style='border-right:1.0pt solid black;border-left:
  none'>{{ date('d-M-Y', strtotime($cost[0]->tanggal_pickup)) }}</td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td height=21 class=xl103 style='height:16.0pt'>DITERIMA OLEH</td>
            <td colspan=2 class=xl103 style='border-right:.5pt solid black'>DITANGANI OLEH</td>
            <td rowspan=2 class=xl104 style='border-bottom:.5pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->tipe_paket == 'Barang' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>BARANG</span>
                </div>
            </td>
            <td rowspan=2 class=xl104 style='border-bottom:.5pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->pelayanan == 'harga_normal' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>NORMAL</span>
                </div>
            </td>
        </tr>
        <tr height=8 style='mso-height-source:userset;height:6.0pt'>
            <td rowspan=5 height=72 class=xl107 style='border-bottom:1.0pt solid black;
  height:54.0pt'>Nama Jelas & Stempel</td>
            <td colspan=2 rowspan=4 class=xl107 style='border-right:.5pt solid black'>
                <img src='http://newtema.picloud.id/assets/ttd.jpeg' width=100%>
            </td>
        </tr>
        <tr height=21 style='height:16.0pt'>
            <td rowspan=2 height=28 class=xl104 style='border-bottom:.5pt solid black;
  height:21.0pt;border-top:none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->tipe_paket == 'Dokumen' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>DOKUMEN</span>
                </div>
            <td rowspan=2 class=xl104 style='border-bottom:.5pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->pelayanan == 'harga_express' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>EXPRESS</span>
                </div>
            </td>
        </tr>
        <tr height=7 style='mso-height-source:userset;height:5.0pt'>
        </tr>
        <tr height=23 style='mso-height-source:userset;height:17.0pt'>
            <td rowspan=2 height=36 class=xl104 style='border-bottom:1.0pt solid black;
  height:27.0pt;border-top:none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->tipe_paket == 'Lain-lain' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>OTHERS</span>
                </div>
            </td>
            <td rowspan=2 class=xl104 style='border-bottom:1.0pt solid black;border-top:
  none'>
                <div class="div-checkbox">
                    <i class="far {{ $paket[0]->pelayanan == 'harga_super_express' ? 'fa-check-circle' : 'fa-circle' }}"></i> <span>SUPER EXPRESS</span>
                </div>
            </td>
        </tr>
        <tr height=13 style='mso-height-source:userset;height:10.0pt'>
            <td colspan=2 height=13 class=xl114 style='border-right:.5pt solid black;
  height:10.0pt'><u>Philipus Sahat S.</u><br>General Manager</td>
        </tr>
    </table>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.print();
        })
    </script>
</body>

</html>