function fillCustomer() {

    $(document).on("click", ".modal-button", function () {
        $(".modal-body #cust_name").val( window.localStorage['custname'] );
        $(".modal-body #id_cust").val( window.localStorage['id_cust'] );
   });
   
    // $.ajax({
    //     url     : 'api/customers',
    //     method  : 'GET',
    //     dataType: 'json',
    //     header  : {'token':window.localStorage['token']},
    //         success:(res)=>{
    //             var data    = res.data.data;
    //             var content = '';
    //             for (var index = 0; index < data.length; index++) {
    //                 var item = data[index];
    //                 content += `option value = ${item.id}> ${item.first_name} ${item.last_name} </option>`
    //             }
    //             $('select[name=customer_id]').html(content);
    //         },
    //         error:(res, status, err)=>{
    //             alert('Tidak Dapat Tambah Data (Customer)');
    //         }
    // });
}

function fillProduct() {
    $.ajax({
        url     : 'api/products',
        method  : 'GET',
        dataType: 'json',
        header  : {'token':window.localStorage['token']},
            success:(res)=>{
                console.log(res);
                var data    = res.data.data;
                var content = '';
                for (var index = 0; index < data.length; index++) {
                    var item = data[index];
                    content += `<option value = ${item.id}> ${item.title} ${item.category} </option>`
                }
                $('select[name=product_id]').html(content);
            },
            error:(res, status, err)=>{
                alert('Tidak Dapat Tambah Data (Product)');
            }
    });
}

function hapus(id) {
    $.ajax({
        url     : 'api/orders/' + id,
        method  : 'DELETE',
        type    : 'json',
        header  : { 'token' : window.localStorage['token'] },
        success : (res) => {
            alert('Data Berhasil Dihapus');
            refreshData();
        },
        error   : (res, stts, err) => {
            alert('Gagal Hapus Data');
        }
    })
}

function save(id) {
    console.log(window.localStorage['token']);
    console.log($('select[name = product_id]').val());
    console.log(window.localStorage['id_cust']);
    console.log($('input[name = qty]').val());
    $.ajax({
        url     : 'api/orders' + (id !== undefined ? `/${id}` : ''),
        method  : id !== undefined ? 'PATCH' : 'POST',
        dataType: 'json',
        data    : {
            'product_id'    : $('select[name = product_id]').val(),
            'customer_id'   : window.localStorage['id_cust'],
            'qty'           : $('input[name = qty]').val()
        },
        header  : {'token'  : window.localStorage['token']},
        success : (res)=>{
            console.log('sukses', res);
            alert('Data Order Berhasil Direkam');
            $('#modalOrder').modal('hide');
            refreshData();
        },
        error   : (res, status, err)=>{
            console.log('error : ', res);
            alert('Order Gagal Direkam');
        } 
    });
}

document.addEventListener('DOMContentLoaded', (c)=>{
    
    $('body').on('click','a.link-hapus', (e) => {
        var c = confirm('Hapus Data?');
        if (c === true){
            var id = $(this).attr("data-id");
            console.log(id), 2;
            hapus(id);
        }
    });

    fillCustomer();
    fillProduct();

    $('.modal-footer #simpan').on('click', (e) => {
        save();
    });
    
});