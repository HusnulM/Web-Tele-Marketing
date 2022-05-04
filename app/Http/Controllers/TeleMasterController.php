<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Excel;
use DB;
use Auth;

class TeleMasterController extends Controller
{
    public function index(){
        return view('input-master');
    }

    public function list(){
        $data = DB::table('contact_masters')->where('sudah_ditelp', 'N')->get();
        return view('display-master', ['dataTelp' => $data]);
    }

    public function detail($id){
        $data = DB::table('contact_masters')->where('id', $id)->first();
        return view('edit-input-master', ['dataTelp' => $data]);
    }

    public function laporanSelection(){
        // laporanSelection
        return view('laporan-sel');
    }

    public function laporanView($strdate, $enddate){
        $query = DB::table('contact_masters');

        if($strdate != 'null' && $enddate != 'null'){
            $query->whereBetween('createdon', [$strdate, $enddate]);
        }elseif($strdate != 'null' && $enddate == 'null'){
            $query->where('createdon', $strdate);
        }elseif($strdate == 'null' && $enddate != 'null'){
            $query->where('createdon', $enddate);
        }

        $data = $query
                ->orderBy('id','ASC')
                ->get();

        // $data = DB::table('contact_masters')
        //     ->where('sudah_ditelp', 'N')->get();
        return view('laporan-view', ['dataTelp' => $data]);
    }

    public function save(Request $request){
        // contact_masters
        // return $request;
        $tglTelp = null;
        $telpStatus = 'N';
        if(isset($request['cbTelpStatus'])){
            $telpStatus = 'Y';
            DB::beginTransaction();
            try{
                $output = array();
                $insertData = array(
                    'no_telp'       => $request['noHp'],
                    'nama'          => $request['nama'],
                    'sudah_ditelp'  => $telpStatus,
                    'tgl_telp'      => $request['tgltelp'],
                    'telp_oleh'     => null,
                    'comment'       => $request['comment'] ?? null,
                    'createdby'     => Auth::user()->name,
                    'createdon'     => date('Y-m-d')
                );
                // return $insertData;
                array_push($output, $insertData);
                insertOrUpdate($output,'contact_masters');
                DB::commit();
                return Redirect::to("/input-data")->withSuccess('Data berhasil di input');
            }catch(\Exception $e){
                DB::rollBack();
                return Redirect::to("/input-data")->withError($e->getMessage());
            }
        }else{
            DB::beginTransaction();
            try{
                $output = array();
                $insertData = array(
                    'no_telp'       => $request['noHp'],
                    'nama'          => $request['nama'],
                    'sudah_ditelp'  => $telpStatus,
                    // 'tgl_telp'      => $tglTelp,
                    // 'telp_oleh'     => null,
                    'comment'       => $request['comment'] ?? null,
                    'createdby'     => Auth::user()->name,
                    'createdon'     => date('Y-m-d')
                );
                // return $insertData;
                array_push($output, $insertData);
                insertOrUpdate($output,'contact_masters');
                DB::commit();
                return Redirect::to("/input-data")->withSuccess('Data berhasil di input');
            }catch(\Exception $e){
                DB::rollBack();
                return Redirect::to("/input-data")->withError($e->getMessage());
            }
        }

        // if($request['tgl_telp'] !== 'null' || $request['tgl_telp'] != null){
        //     $tglTelp    = $request['tgltelp'];
        // }
    }

    public function update(Request $request){
        // contact_masters
        // return $request;
        $tglTelp = null;
        $telpStatus = 'N';
        if(isset($request['cbTelpStatus'])){
            $telpStatus = 'Y';
            DB::beginTransaction();
            try{
                DB::table('contact_masters')->where('id', $request['idData'])
                ->update([
                    'no_telp'       => $request['noHp'],
                    'nama'          => $request['nama'],
                    'sudah_ditelp'  => $telpStatus,
                    'tgl_telp'      => $request['tgltelp'],
                    // 'telp_oleh'     => null,
                    'comment'       => $request['comment'],
                    'createdby'     => Auth::user()->name,
                    'createdon'     => date('Y-m-d')
                ]);
                DB::commit();
                return Redirect::to("/display-data")->withSuccess('Data berhasil di update');
            }catch(\Exception $e){
                DB::rollBack();
                return Redirect::to("/display-data")->withError($e->getMessage());
            }
        }else{
            DB::beginTransaction();
            try{
                DB::table('contact_masters')->where('id', $request['idData'])
                ->update([
                    'no_telp'       => $request['noHp'],
                    'nama'          => $request['nama'],
                    'sudah_ditelp'  => $telpStatus,
                    // 'tgl_telp'      => $request['tgltelp'],
                    // 'telp_oleh'     => null,
                    'comment'       => $request['comment'],
                    'createdby'     => Auth::user()->name,
                    'createdon'     => date('Y-m-d')
                ]);
                DB::commit();
                return Redirect::to("/display-data")->withSuccess('Data berhasil di update');
            }catch(\Exception $e){
                DB::rollBack();
                return Redirect::to("/display-data")->withError($e->getMessage());
            }
        }
    }
}
