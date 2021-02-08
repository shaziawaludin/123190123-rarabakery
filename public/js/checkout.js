$(function(){
    var totalOngkir =0
    var ongkir=0;
    var biayaLayanan=0;
    var totalHargaBarang=0;

    totalHargaBarang =parseInt($('#total-harga-barang')
        .html().split('.').join(''));
    $('select').each(function(){
        if($(this).find(":selected").attr('harga')){   
            totalOngkir += parseInt($(this).find(":selected").attr('harga'));
        } else
            ongkir =0;
    });

    $('#total-keseluruhan').html($('#total-harga-barang').html());
    $('select').change(function(){  
        totalOngkir = 0;
        $('select').each(function(){
            if($(this).find(":selected").attr('harga')){   
                totalOngkir += parseInt($(this).find(":selected").attr('harga'));
            } else
                ongkir =0;
        });
        
        $('#total-keseluruhan')
        .html((parseInt(totalOngkir)+parseInt($('#total-harga-barang')
        .html().split('.').join('')))
        .toString()
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    });
    $('select').change(function(){  
        totalOngkir = 0;
        $('select').each(function(){
            if($(this).find(":selected").attr('harga')){   
                totalOngkir += parseInt($(this).find(":selected").attr('harga'));
            } else
                ongkir =0;
        });
        
        
        $('#total-keseluruhan')
        .html((parseInt(totalOngkir)+totalHargaBarang)
        .toString()
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

        $('#total-ongkir').html(parseInt(totalOngkir).toString()
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

        $('#total-bayar-red').html((totalHargaBarang+totalOngkir+biayaLayanan).toString()
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    });


    $('input[type=radio]').click(function(){
       biayaLayanan = parseInt($(this).attr('biaya-layanan'));
       $('#biaya-layanan').html(biayaLayanan);
       $('#total-bayar-red').html((totalHargaBarang+totalOngkir+biayaLayanan).toString()
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

       $('#pmethod').val($(this).val());
    });

    $('#modal-trigger-1').click(function(){
        $('#total-bayar-red').html((totalHargaBarang+totalOngkir+biayaLayanan).toString()
       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    })

    $('#bayar-trigger').click(function(){
        var pemcheck = false;
        $('input[type=radio]').each(function(){
            if($(this).is(':checked')){
                pmcheck = true;
            }
        });
        if($('#pmethod').val() !=null && pmcheck){
            $('#form-checkout').submit();
        }
    });


});