$(document).ready(function() {
    $('#tujuan, #pelayanan').on('change', function() {
        let tujuan = $(this).val();
        let tipe = $('select[name="pelayanan"]').val();
        let rawSik = $('#no_sik').val();
        let rawKode = rawSik.split(' / ', 2);
        let kode = rawKode[1];
        if (tujuan && tipe) {
            $.ajax({
                url: 'getCost/ajax/' + tujuan + '/' + tipe + '/' + kode,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#total_harga').val(data[0]);
                    $('#berat, #diskon, #biaya_tambahan').on('change', function() {
                        let berat = $('#berat').val();
                        let diskon = $('#diskon').val();
                        let tambahan = $('#biaya_tambahan').val();
                        if (berat > -1) {
                            let harga = berat * data[0] - -(tambahan) - diskon;
                            $('#total_harga').val(harga);
                            $('#total_harga').html(harga);
                        }
                    });
                }
            });
        } else {
            $('select[name="total_harga"]').empty();
        }
    });
});

// NO SIK & ALAMAT
$(document).ready(function() {
    $('#kustomer').on('change', function() {
        let kustomer = $(this).val();
        if (kustomer) {
            $.ajax({
                url: 'getSik/ajax/' + kustomer,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let sik = 'SIK / ' + data['kode'] + ' / ';
                    $('#no_sik').val(sik);
                    $('#alamat_pengirim').val(data['alamat']);
                }
            });
        } else {
            $('#no_sik').empty();
            $('#alamat_pengirim').empty();
        }
    });
});

// File Input 
$(document).ready(function() {
    $('.btn-file1').on('click', function() {
        $('.file1').trigger('click');
    });

    $('.file1').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name1').val(fileName);
    });
});

$(document).ready(function() {
    $('.btn-file2').on('click', function() {
        $('.file2').trigger('click');
    });

    $('.file2').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name2').val(fileName);
    });
});

$(document).ready(function() {
    $('.btn-file3').on('click', function() {
        $('.file3').trigger('click');
    });

    $('.file3').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name3').val(fileName);
    });
});

$(document).ready(function() {
    $('.btn-file4').on('click', function() {
        $('.file4').trigger('click');
    });

    $('.file4').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name4').val(fileName);
    });
});

$(document).ready(function() {
    $('.btn-file5').on('click', function() {
        $('.file5').trigger('click');
    });

    $('.file5').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name5').val(fileName);
    });
});

$(document).ready(function() {
    $('.btn-file6').on('click', function() {
        $('.file6').trigger('click');
    });

    $('.file6').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name6').val(fileName);
    });
});

$(document).ready(function() {
    $('.btn-file7').on('click', function() {
        $('.file7').trigger('click');
    });

    $('.file7').on('change', function() {
        var fileName = $(this)[0].files[0].name;
        $('#file-name7').val(fileName);
    });
});
