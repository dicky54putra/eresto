$(function() {


    // ketika tombol edit di klik maka jalankan fungsi diawah
    $('.tambah').on('click', function(){

        // mengubah form ModalLabel
        $('#defaultModalLabel').html('Tambah Menu Makanan');

        $('.modal-body form').attr('action', 'http://localhost/eresto/masakan');
        $('#nama').val('');
        $('#harga').val('');
        $('#id').val('');

    });

    // ketika tombol edit di klik maka jalankan fungsi diawah
    $('.edit').on('click', function(){
        

        // mengubah form modalLAbel
        $('#defaultModalLabel').html('Edit Menu Makanan');

        // pindahin action
        $('.modal-body form').attr('action', 'http://localhost/eresto/masakan/edit');

        // mengambil data berdasarkan id
        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/eresto/masakan/getedit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                 $('#nama').val(data.nama_masakan);
                 $('#harga').val(data.harga);
                 $('#id').val(data.id_masakan);
            }
        });


    });

});