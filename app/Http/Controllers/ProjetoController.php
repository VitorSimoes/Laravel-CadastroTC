<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function redirectsub()
    {
        return view('home2');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'mimes:pdf'
        ]);


        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
//                    +Auth::user()->id;
            }
        }
        $file = new Projeto();
        $file->user_id = Auth::user()->id;
        $file->filename = json_encode($data);
        $file->save();
        return back()->with('success', 'Seus arquivos foram adicionados com sucesso');
    }
}
