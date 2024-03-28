<?php

namespace App\Http\Controllers;

use App\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Monolog\Registry;

class RegistrationController extends Controller
{
    public function create()
    {
        $check_if_registered = Registration::where('user_id', Auth::user()->id)->first();
        if ($check_if_registered != NULL && $check_if_registered->count() > 0) {
            return redirect()->route('dashboard.registration.detail');
        }

        $data = [
            'title' => 'Registrasi Siswa'
        ];

        return view('dashboard.registration.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'max:15'],
            'address' => ['required'],
            'gender' => ['required', Rule::in(['L', 'P'])],
            'last_score' => ['required'],
            'dob' => ['required', 'date']
        ]);

        $registration = new Registration();
        $registration->user_id = Auth::user()->id;
        $registration->address = $request->address;
        $registration->phone = $request->phone;
        $registration->gender = $request->gender;
        $registration->dob = $request->dob;
        $registration->last_score = $request->last_score;
        $registration->status = 'pending';
        $registration->save();

        return redirect()->route('dashboard.index');
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Registrasi',
            'registration' => Registration::where('user_id', Auth::user()->id)->first()
        ];

        return view('dashboard.registration.detail', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'List Pendaftar',
            'registrations' => Registration::with(['user'])->latest()->where('status', '!=', 'diterima')->get()
        ];

        return view('dashboard.registration.index', $data);
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        $data = [
            'title' => 'Detail Pendaftarab',
            'registration' => $registration
        ];

        return view('dashboard.registration.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', Rule::in(['pending', 'diterima', 'cadangan', 'tidak_diterima'])]
        ]);
        // dd($request->all());

        $registration = Registration::findOrFail($id);
        $registration->status = $request->status;
        $registration->verified_at = Carbon::now();
        $registration->save();

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function siswa()
    {
        $data = [
            'title' => 'List Siswa Diterima',
            'registrations' => Registration::with(['user'])->latest()->where('status', 'diterima')->get()
        ];

        return view('dashboard.registration.index', $data);
    }

    public function cetak_kartu()
    {
        $reg = Registration::where('user_id', Auth::user()->id)->first();
        if ($reg->status == 'diterima' || $reg->status == 'cadangan') {
            $data = [
                'title' => 'Cetak Kartu',
                'registration' => $reg
            ];

            return view('dashboard.registration.cetak', $data);
        } else {
            return redirect()->route('dashboard.index')->with('error', 'Status anda belum diterima');
        }
    }

    public function destroy(Request $request, $id)
    {
        Registration::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
