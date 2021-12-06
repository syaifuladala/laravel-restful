<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Customers;

class AuthController extends BaseController
{
    public function auth()
    {
        $authheader = \request()->header('Authorization');  //basic email:password

        $keyauth    = base64_decode(substr($authheader, 6));
        

        [$email, $pass]   = explode(':', $keyauth);

        $data   = (new Customers())->newQuery()
                    ->where(['email'=>$email])
                    ->get(['id','first_name','last_name','email','password'])->first();
        
        if ($data == null) {
            return $this->out(status:'Gagal',code:404,error:['Pengguna Tidak Ditemukan']);
        }else{
            if (Hash::check($pass, $data->password)) {
                $data->token = hash('sha256', Str::random(10)); //buat token untuk dikirim ke client
                unset($data->password);                         //menghilangkan info password yg dikirim ke client
                $data->update();                                //update token disimpan ke tabel customer

                return $this->out(data: $data, status:"OK");
            }else{
                return $this->out(status:"Gagal", code:401, error:["Anda Tidak Memiliki Wewenang"]);
            }
        }
    }
}
