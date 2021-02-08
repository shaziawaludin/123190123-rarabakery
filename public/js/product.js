$(function(){
    $('#qty').click(function(){
       $('#subtotal').html(
           ($('#barang_harga').attr("data-barang-harga") 
           * $('#qty').val()).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
        );
    });
    $('#qty').on('input',function(){
        $('#subtotal').html(
            ($('#barang_harga').attr("data-barang-harga") 
            * $('#qty').val()).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
         );
        console.log($('#barang_harga').attr("data-barang-harga"));
    });
    
    // qtyinput =  $('#qty');
    // qtyinput.addEventListener("input", function(){
    //     $('#subtotal').html(
    //         ($('#barang_harga').attr("data-barang-harga") 
    //         * $('#qty').val()).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
    //      );
    // });

    $('#foto_kecil2').click(function(){
        const fotokecil = $('#foto_kecil2').attr("src");
        const fotobesar = $('#foto_besar').attr("src");
        $('#foto_besar').attr("src",fotokecil);
        $('#foto_kecil2').attr("src",fotobesar);
    });
    $('#foto_kecil3').click(function(){
        const fotokecil = $('#foto_kecil3').attr("src");
        const fotobesar = $('#foto_besar').attr("src");
        $('#foto_besar').attr("src",fotokecil);
        $('#foto_kecil3').attr("src",fotobesar);
    });
    
    $('#foto_kecil4').click(function(){
        const fotokecil = $('#foto_kecil4').attr("src");
        const fotobesar = $('#foto_besar').attr("src");
        $('#foto_besar').attr("src",fotokecil);
        $('#foto_kecil4').attr("src",fotobesar);
    });


    $('#btn_submit_keranjang').click(function(){
        const qty = $('#qty').val();
        const barang_id = $('#barang_id').val();
        const catatan = $('textarea').val();
        
        console.log(catatan);
        console.log(qty);
        console.log(barang_id);
        
        var varian;
        $('select').each(function(){
            if($(this).find(":selected").attr('harga')){   
              varian = parseInt($(this).find(":selected").val());
            } else
              varian = 1;
        });
       
        $.ajax({
            url: 'http://localhost/123190123-rarabakery/public/cart/addCart',
            data: {
                qty: qty,
                barang_id: barang_id,
                catatan: catatan,
                varian: varian
            },
            method: 'POST',
            dataType: 'json',
            success: function(data){
                if(data.msg){
                    $('#cartmsg').html(data.msg);
                }
            },
            error: function(){
                console.log("error");
            } 
        });
       
    });


});