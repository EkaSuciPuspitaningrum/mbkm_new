<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\MahasiswaMbkm;
use App\Models\User;
use Database\Seeders\MBKMSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\True_;

class LogBookController extends Controller
{
    public function render()
    {
        $mhsw_mbkm_exist = false;
        $mahasiswa_mbkm_id = LogBook::where('mahasiswa_mbkm_id', Auth::user()->id)->first();

        if ($mahasiswa_mbkm_id) {
            $mhsw_mbkm_exist = true;
        }

        return view("mbkm.logbook.logbook", [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mahasiswa_mbkm_id' => $mahasiswa_mbkm_id
        ]);
    }

    public function render_form()
    {
        return view("mbkm.logbook.logbook-form");
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_log' => 'required|date',
            'tempat' => 'required|string',
            'uraian' => 'required|string',
            'rencana_pencapaian' => 'required|string',
            'id' => 'sometimes|numeric'
        ]);

        if ($request->exists('id')) {
            $logbook = LogBook::find($request->get('id'));
            if (!$this->checkIfUserHasAccessToLog(Auth::user(), $logbook)) {
                return abort(403);
            }
        } else {
            $logbook = new LogBook();
        }

        $mhsw_mbkm = Auth::user()->getMahasiswaMbkm()->first();

        if (!$mhsw_mbkm) {
            return redirect()->back()->with('error', 'Anda belum mendaftar program MBKM! Daftar MBKM dahulu sebelum memasukkan entri logbook');
        }

        $logbook->mahasiswa_mbkm_id = $mhsw_mbkm->id;

        $logbook->fill($request->all());

        $logbook->save();

        return redirect()->to('/logbook');
    }

    public function checkIfUserHasAccessToLog(User $user, LogBook $logBook)
    {
        $mhsw_mbkm = $logBook->getMahasiswaMbkm()->first();
        $mhsw = $mhsw_mbkm->getMhsw()->first();

        if ($user === $mhsw) {
            return true;
        } else {
            return false;
        }
    }

    public function render_noreg(string $mahasiswa_mbkm_id)
    {
        $from_noreg = true;
        $mhsw_mbkm_exist = true;
        $mhsw_mbkm = LogBook::where('mahasiswa_mbkm_id', $mahasiswa_mbkm_id)->first();

        return view('mbkm.logbook.logbook_guest', [
            'mhsw_mbkm_exist' => $mhsw_mbkm_exist,
            'mhsw_mbkm' => $mhsw_mbkm,
            'from_noreg' => $from_noreg
        ]);
    }
}