<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Hash;
class AdminController extends Controller
{
    
    public function index(Request $request){
        $users = DB::select('select * from nilai');
        return view('admin/nilai', ['title' => 'NILAI','data_user' => $users]);
    }
    public function grafik(Request $request){
        $users = DB::select('select * from nilai');
        $d = DB::select('select (SELECT COUNT(quiz) FROM nilai WHERE quiz<=65) AS quiz, (SELECT COUNT(tugas) FROM nilai WHERE tugas<=65) AS tugas, (SELECT COUNT(absensi) FROM nilai WHERE absensi<=65) AS absensi, (SELECT COUNT(praktek) FROM nilai WHERE praktek<=65) AS praktek, (SELECT COUNT(uas) FROM nilai WHERE uas<=65) AS uas ');
        $c = DB::select('select (SELECT COUNT(quiz) FROM nilai WHERE quiz>65 AND quiz<=75) AS quiz, (SELECT COUNT(tugas) FROM nilai WHERE tugas>65 AND tugas<=75) AS tugas, (SELECT COUNT(absensi) FROM nilai WHERE absensi>65 AND absensi<=75) AS absensi, (SELECT COUNT(praktek) FROM nilai WHERE praktek>65 AND praktek<=75) AS praktek, (SELECT COUNT(uas) FROM nilai WHERE uas>65 AND uas<=75) AS uas ');
        $b= DB::select('select (SELECT COUNT(quiz) FROM nilai WHERE quiz>75 AND quiz<=85) AS quiz, (SELECT COUNT(tugas) FROM nilai WHERE tugas>75 AND tugas<=85) AS tugas, (SELECT COUNT(absensi) FROM nilai WHERE absensi>75 AND absensi<=85) AS absensi, (SELECT COUNT(praktek) FROM nilai WHERE praktek>75 AND praktek<=85) AS praktek, (SELECT COUNT(uas) FROM nilai WHERE uas>75 AND uas<=85) AS uas ');
        $a = DB::select('select (SELECT COUNT(quiz) FROM nilai WHERE quiz>85 AND quiz<=100) AS quiz, (SELECT COUNT(tugas) FROM nilai WHERE tugas>85 AND tugas<=100) AS tugas, (SELECT COUNT(absensi) FROM nilai WHERE absensi>85 AND absensi<=100) AS absensi, (SELECT COUNT(praktek) FROM nilai WHERE praktek>85 AND praktek<=100) AS praktek, (SELECT COUNT(uas) FROM nilai WHERE uas>85 AND uas<=100) AS uas ');
        
        return view('admin/grafik', ['title' => 'GRAFIK','a' => $a,'b' => $b,'c' => $c,'d' => $d]);
    }
    public function add_nilai(Request $request){
        DB::insert('INSERT INTO nilai (nama,quiz,tugas,absensi,praktek,uas) VALUES(?,?,?,?,?,?)',[$request->nama,$request->quiz,$request->tugas,$request->absensi,$request->praktek,$request->uas]);
        return redirect(route('nilai'));
    }
    public function delete_nilai(Request $request){
        DB::delete('DELETE FROM nilai WHERE id=?',[$request->del]);
        return redirect(route('nilai'));
    }
    public function edit_nilai(Request $request){
        DB::update('UPDATE nilai SET nama=?,quiz=?,tugas=?,absensi=?,praktek=?,uas=? WHERE id=?' ,[$request->nama,$request->quiz,$request->tugas,$request->absensi,$request->praktek,$request->uas,$request->del]);
        return redirect(route('nilai'));
    }
    
    public function jenis(Request $request){
        $users = DB::select('select * from jenis');
        return view('admin/jenis', ['title' => 'JABATAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users]);
    }
    public function add_jenis(Request $request){
        DB::insert('INSERT INTO jenis (name) VALUES(?)',[$request->name]);
        return redirect(route('jenis'));
    }
    public function delete_jenis(Request $request){
        DB::delete('DELETE FROM jenis WHERE id=?',[$request->del]);
        return redirect(route('jenis'));
    }
    public function edit_jenis(Request $request){
        DB::update('UPDATE jenis SET name=? WHERE id=?' ,[$request->name,$request->del]);
        return redirect(route('jenis'));
    }
    
    public function tentara(Request $request){
        $users = DB::select('select tentara.id , tentara.nama_tentara, tentara.id_jenis as id_jenis, tentara.alamat, tentara.nrp, tentara.pangkat, tentara.tahun_masuk, jenis.name as nama_jenis from tentara INNER JOIN jenis ON tentara.id_jenis = jenis.id');
        $jenis = DB::select('select * FROM jenis');
        return view('admin/tentara', ['title' => 'tentara','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'jenis' => $jenis]);
    }
    public function add_tentara(Request $request){
        DB::insert('INSERT INTO tentara (nama_tentara,id_jenis,nrp,pangkat,alamat,tahun_masuk) VALUES(?,?,?,?,?,?)',[$request->nama_tentara,$request->id_jenis,$request->nrp,$request->pangkat,$request->alamat,$request->tahun_masuk]);
        return redirect(route('tentara')); 
    }
    public function delete_tentara(Request $request){
        DB::delete('DELETE FROM tentara WHERE id=?',[$request->del]);
        return redirect(route('tentara'));
    }
    public function edit_tentara(Request $request){
        DB::update('UPDATE tentara SET nama_tentara=?,id_jenis=?,nrp=?,pangkat=?,alamat=?,tahun_masuk=? WHERE id=?' ,[$request->nama_tentara,$request->id_jenis,$request->nrp,$request->pangkat,$request->alamat,$request->tahun_masuk,$request->del]);
        return redirect(route('tentara'));
    }
    
    
    public function chart(Request $request){
        $jenis = DB::select('select * FROM jenis');
        $data = array();
        foreach($jenis as $d){
          $data[$d->name] = 0;
        }
        foreach($data as $key => $item){
            $temp = DB::select('select count(*) as JUMLAH FROM tentara JOIN jenis ON tentara.id_jenis = jenis.id where jenis.name = ?',[$key]);
            $data[$key] = $temp[0]->JUMLAH;
        }
        return view('admin/laporan', ['title' => 'LAPORAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data' => $data]);
    }
}
