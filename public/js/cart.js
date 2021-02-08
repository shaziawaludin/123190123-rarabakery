$(function(){



    $('.bintrash').click(function(){
        tid = $(this).attr('trash-id');
        window.location = "http://localhost/123190123-rarabakery/public/cart/hapus/"+tid;
    });
    $('#btn-input-trigger').click(function(){
        console.log('berhasil');
        $('#keranjang_belanja').submit();
    });

    $(':checkbox').click(function(){
    qty=0;
    total_qty=0;
    total_harga=0;

    $(':checkbox').each(function(){
        if($(this).is(":checked")){
            id = $(this).val();
            // console.log(id);
            total_qty +=  parseInt($('#barang_jumlah'+id).val());
            total_harga += parseInt($('#bharga'+id).html().split('.').join(''))
                        *parseInt($('#barang_jumlah'+id).val());
        }
    });
    console.log(total_qty);
    $('.total-harga').html((total_harga).toString()
    .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    $('.total_qty').html(total_qty);

    });

    $('input[type=number]').click(function(){
    qty=0;
    total_qty=0;
    total_harga=0;

    $(':checkbox').each(function(){
        if($(this).is(":checked")){
            id = $(this).val();
            // console.log(id);
            
            total_qty +=  parseInt($('#barang_jumlah'+id).val());
            total_harga += parseInt($('#bharga'+id).html().split('.').join(''))
                        *parseInt($('#barang_jumlah'+id).val());
        }
    });
    console.log(total_qty);
    $('.total-harga').html((total_harga).toString()
    .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    $('.total_qty').html(total_qty);
    });

    $('input[type=number]').on('input',function(){
        qty=0;
        total_qty=0;
        total_harga=0;

        $(':checkbox').each(function(){
            if($(this).is(":checked")){
                id = $(this).val();
                // console.log(id);
                
                total_qty +=  parseInt($('#barang_jumlah'+id).val());
                total_harga += parseInt($('#bharga'+id).html().split('.').join(''))
                            *parseInt($('#barang_jumlah'+id).val());
            }
        });
        console.log(total_qty);
        $('.total-harga').html((total_harga).toString()
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        $('.total_qty').html(total_qty);
    });
});