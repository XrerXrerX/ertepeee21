<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RtpProvider;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRtpProviderRequest;
use App\Http\Requests\UpdateRtpProviderRequest;
use Illuminate\Contracts\Support\ValidatedData;


class RtpController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->session()->has('login_expired') && $request->session()->get('login_expired')) {
                return redirect('/Ruli29s7djjw00/login')->withErrors(['login_expired' => 'Session habis. Silakan login kembali.']);
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $gambar = RtpProvider::select('gambar')
        //     ->where('divisi', 'hb')
        //     ->take(3)
        //     ->pluck();

        $gambarhb = RtpProvider::where('divisi', 'hb')
            ->take(3)
            ->pluck('gambar')
            ->toArray();

        $gambarrtp = RtpProvider::where('divisi', 'rtp')
            ->take(3)
            ->pluck('gambar')
            ->toArray();

        $gambarmic = RtpProvider::where('divisi', 'mic')
            ->take(3)
            ->pluck('gambar')
            ->toArray();

        $gambarttr = RtpProvider::where('divisi', 'ttr')
            ->take(3)
            ->pluck('gambar')
            ->toArray();

        $gambarpp = RtpProvider::where('divisi', 'pp')
            ->take(3)
            ->pluck('gambar')
            ->toArray();

        $gambaridn = RtpProvider::where('divisi', 'idn')
            ->take(3)
            ->pluck('gambar')
            ->toArray();

        $gambarsg = RtpProvider::where('divisi', 'sg')
            ->take(12)
            ->pluck('gambar')
            ->toArray();

        $totalDivisi = RtpProvider::select('divisi')
            ->distinct()
            ->get();


        return view('dashboard.rtp.index', [
            'title' => 'RTP',
            'hb' => RtpProvider::where('divisi', 'hb')->count(),
            'rtp' => RtpProvider::where('divisi', 'rtp')->count(),
            'mic' => RtpProvider::where('divisi', 'mic')->count(),
            'ttr' => RtpProvider::where('divisi', 'ttr')->count(),
            'pp' => RtpProvider::where('divisi', 'pp')->count(),
            'idn' => RtpProvider::where('divisi', 'idn')->count(),
            'sg' => RtpProvider::where('divisi', 'sg')->count(),
            'gambarhb' => $gambarhb,
            'gambarrtp' => $gambarrtp,
            'gambarmic' => $gambarmic,
            'gambarttr' => $gambarttr,
            'gambarpp' => $gambarpp,
            'gambaridn' => $gambaridn,
            'gambarsg' => $gambarsg,
            'totaldivisi' => $totalDivisi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {

        if ($id == 'PRAGMATIC PLAY') {
            $id = 'pp';
        } elseif ($id == 'HABANERO') {
            $id = 'hb';
        } elseif ($id == 'IDN PLAY') {
            $id = 'idn';
        } elseif ($id == 'PG SOFT') {
            $id = 'rtp';
        } elseif ($id == 'TOP TREND') {
            $id = 'ttr';
        } elseif ($id == 'MICRO GAMING') {
            $id = 'mic';
        } else {
            $id = 'sg';
        }


        $totalDivisi = RtpProvider::select('divisi')
            ->distinct()
            ->get();
        return view('dashboard.rtp.create', [
            'pasarans' => RtpProvider::all(),
            'totaldivisi' => $totalDivisi,
            'provider_slt' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->priority == 'on') {
            $request->merge(['priority' => '1']);
        } else {
            $request->merge(['priority' => '']);
        }

        $validatedData = $request->validate([
            'priority' => 'max:255|in:1',
            'divisi' => 'required|max:255',
            'nama' => 'required|unique:rtp_providers',
            'gambar' => 'image|file|max:5046',
        ]);


        if ($request->divisi == 'pp') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/PP', 'public');
            }
        }

        if ($request->divisi == 'hb') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/HB', 'public');
            }
        }
        if ($request->divisi == 'idn') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/idn', 'public');
            }
        }
        if ($request->divisi == 'rtp') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/PG', 'public');
            }
        }
        if ($request->divisi == 'sg') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/SG', 'public');
            }
        }
        if ($request->divisi == 'ttr') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/TTR', 'public');
            }
        }
        if ($request->divisi == 'mic') {
            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/MIC', 'public');
            }
        }




        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        RtpProvider::create($validatedData);

        return redirect('/rtp/posts/' . $request->divisi)->with('success', 'new post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



        if ($id == 'pp') {
            return view('dashboard.rtp.show', [
                'provider' => 'PRAGMATIC PLAY',
                'id' => 'pp',
                'posts' => RtpProvider::where('divisi', 'pp')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'hb') {
            return view('dashboard.rtp.show', [
                'provider' => 'HABANERO',
                'id' => 'hb',
                'posts' => RtpProvider::where('divisi', 'hb')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'idn') {
            return view('dashboard.rtp.show', [
                'provider' => 'IDN PLAY',
                'id' => 'idn',
                'posts' => RtpProvider::where('divisi', 'idn')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'rtp') {
            return view('dashboard.rtp.show', [
                'provider' => 'PG SOFT',
                'id' => 'rtp',
                'posts' => RtpProvider::where('divisi', 'rtp')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'ttr') {
            return view('dashboard.rtp.show', [
                'provider' => 'TOP TREND',
                'id' => 'ttr',
                'posts' => RtpProvider::where('divisi', 'ttr')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'mic') {
            return view('dashboard.rtp.show', [
                'provider' => 'MICRO GAMING',
                'id' => 'mic',
                'posts' => RtpProvider::where('divisi', 'mic')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        } else {
            return view('dashboard.rtp.show', [
                'provider' => 'GMW',
                'id' => 'sg',
                'posts' => RtpProvider::where('divisi', 'sg')
                    ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(20)->withQueryString()
            ]);
        }
    }

    public function showsearch(string $id)
    {
        if ($id == 'pp') {
            return view('dashboard.rtp.show', [
                'provider' => 'PRAGMATIC PLAY',
                'id' => 'pp',
                'posts' => RtpProvider::where('divisi', 'pp')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString(),
            ]);
        } else if ($id == 'hb') {
            return view('dashboard.rtp.show', [
                'provider' => 'HABANERO',
                'id' => 'hb',
                'posts' => RtpProvider::where('divisi', 'hb')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'idn') {
            return view('dashboard.rtp.show', [
                'provider' => 'IDN PLAY',
                'id' => 'idn',
                'posts' => RtpProvider::where('divisi', 'idn')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'rtp') {
            return view('dashboard.rtp.show', [
                'provider' => 'PG SOFT',
                'id' => 'rtp',
                'posts' => RtpProvider::where('divisi', 'rtp')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'ttr') {
            return view('dashboard.rtp.show', [
                'provider' => 'TOP TREND',
                'id' => 'ttr',
                'posts' => RtpProvider::where('divisi', 'ttr')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        } else if ($id == 'mic') {
            return view('dashboard.rtp.show', [
                'provider' => 'MICRO GAMING',
                'id' => 'mic',
                'posts' => RtpProvider::where('divisi', 'mic')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        } else {
            return view('dashboard.rtp.show', [
                'provider' => 'GMW',
                'id' => 'sg',
                'posts' => RtpProvider::where('divisi', 'sg')
                    ->orderBy('nama', 'asc')->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rtp = RtpProvider::where('id', $id)->first();
        $id = RtpProvider::where('id', $id)->first()->id;
        $divisi = strtoupper(RtpProvider::where('id', $id)->first()->divisi);


        if ($divisi == 'IDN') {
            $divisi = strtolower($divisi);
        }

        if ($divisi == 'RTP') {
            $divisi = 'PG';
        }

        return view('dashboard.rtp.edit', [
            'pasarans' => RtpProvider::where('id', $id)->get(),
            'provider_slt' => $rtp,
            'dataslt' => $id,
            'divisi' => $divisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $date = RtpProvider::where('id', $id)->first()->created_at;
        $divisi = strtoupper(RtpProvider::where('id', $id)->first()->divisi);
        if ($divisi == 'IDN') {
            $divisi = strtolower($divisi);
        }

        if ($divisi == 'RTP') {
            $divisi = 'PG';
        }

        $oldgmbr = substr($request->oldrtpimage, 0, 6);

        if ($request->priority == 'on') {
            $request->merge(['priority' => '1']);
        } else {
            $request->merge(['priority' => '0']);
        }


        if ($request->gambar) {
            $validatedData = $request->validate([
                'priority' => 'max:255',
                'divisi' => 'required|max:255',
                'nama' => 'required',
                'gambar' => 'image|file|max:5046',
            ]);

            if ($request->divisi) {
                if (strtotime($date) < strtotime('2020-01-01')) {
                    Storage::delete('public/imgrtp/' . $divisi . '/' . $request->oldrtpimage);
                } else {
                    Storage::delete('public/' . $request->oldrtpimage);
                }
                $validatedData['gambar'] = $request->file('gambar')->store('imgrtp/' . $divisi, 'public');
            }
        } else {
            $validatedData = $request->validate([
                'priority' => 'max:255',
                'divisi' => 'required|max:255',
                'nama' => 'required',
            ]);
            if ($oldgmbr == 'imgrtp') {
                $validatedData['gambar'] =  $request->oldrtpimage;
            } else {
                $validatedData['gambar'] = 'imgrtp/' . $divisi . '/' . $request->oldrtpimage;
            }
        }



        RtpProvider::where('id', $id)
            ->update($validatedData);

        return redirect('/rtp/posts/' . $request->divisi)->with('success', 'new post has been added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rpts = RtpProvider::where('id', $id)->get();
        $rpt = RtpProvider::where('id', $id)->first()->gambar;
        $psrn = RtpProvider::where('id', $id)->first()->divisi;
        $date = RtpProvider::where('id', $id)->first()->created_at;


        if (strtotime($date) < strtotime('2020-01-01')) {
            if ($psrn == 'pp') {
                Storage::delete('public/imgrtp/PP/' . $rpt);
            } else if ($psrn == 'hb') {
                Storage::delete('public/imgrtp/HB/' . $rpt);
            } else if ($psrn == 'ttr') {
                Storage::delete('public/imgrtp/TTR/' . $rpt);
            } else if ($psrn == 'mic') {
                Storage::delete('public/imgrtp/MIC/' . $rpt);
            } else if ($psrn == 'rtp') {
                Storage::delete('public/imgrtp/PG/' . $rpt);
            } else if ($psrn == 'idn') {
                Storage::delete('public/imgrtp/idn/' . $rpt);
            } else if ($psrn == 'sg') {
                Storage::delete('public/imgrtp/SG/' . $rpt);
            }
        } else {
            if ($psrn) {
                Storage::delete('public/' . $rpt);
            }
        }
        RtpProvider::destroy($rpts);
        return redirect('rtp/posts/' . $psrn)->with('success', ' post has been deleted!');
    }
}
