document.addEventListener('DOMContentLoaded', (c)=>{
    $('#btn-login').on('click', ()=>{
        var email = $('#email').val();
        var password = $('#password').val();

        console.log(email);
        console.log(password);

        $.ajax({
            url     : 'api/auth',
            dataType: 'json',
            method  : 'GET',
            headers : {
                'Authorization' : 'basic ' + window.btoa(email + ':' + password)
            },
            success:(msg)=>{
                var custname =  `${msg.data.first_name} ${msg.data.last_name}`;
                alert(`Selamat Datang ${custname}`);
                window.localStorage.setItem('id_cust', msg.data.id);
                window.localStorage.setItem('custname', custname);
                window.localStorage.setItem('token', msg.data.token);

                window.location = '/orderlist';
            },
            error:(req, status, err)=>{
                console.log(req);
                alert(req.responseJSON.error[0]);
            }
        });
    });
});