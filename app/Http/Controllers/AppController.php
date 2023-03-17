<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function gestionMachine(){
        return view("gestionMachine", ['machineList'=>Machine::all(), 'salleList'=>Salle::all()]);
    }

    public function gestionSalle(){
        return view("gestionSalle", ['salleList'=>Salle::all()]);
    }

    public function saveSalle(Request $request){
        $newSalle = new Salle;
        $newSalle->code = $request->code;
        $newSalle->libelle = $request->libelle;
        $newSalle->save();
        return redirect('/gestionSalle');
    }

    public function removeSalle($id){
        Salle::where('id', $id)->delete();
        return redirect('/gestionSalle');
    }

    public function saveMachine(Request $request){
        $newMachine = new Machine;
        $newMachine->reference = $request->reference;
        $newMachine->nom = $request->nom;
        $newMachine->prix = $request->prix;
        $newMachine->salleId = $request->salleid;
        $newMachine->save();
        return redirect('/gestionMachine');
    }

    public function removeMachine($id){
        Machine::where('id', $id)->delete();
        return redirect('/gestionMachine');
    }

    public function showSalle($id){
        $salle = Salle::find($id);
        return view('editSalle', ['salle'=>$salle]);
    }

    public function editSalle(Request $request){
        $salle = Salle::find($request->id);
        $salle->code = $request->code;
        $salle->libelle = $request->libelle;
        $salle->save();
        return redirect('/gestionSalle');
    }

    public function showMachine($id){
        $machine = Machine::find($id);
        return view('editMachine', ['machine'=>$machine, 'salleList'=>Salle::all()]);
    }

    public function editMachine(Request $request){
        $machine = Machine::find($request->id);
        $machine->reference = $request->reference;
        $machine->prix = $request->prix;
        $machine->nom = $request->nom;
        $machine->salleId = $request->salleid;
        $machine->save();
        return redirect('/gestionMachine');
    }

    public function statistique(){
        $x=array();
        $y=array();
        $results = DB::select('SELECT s.libelle, COUNT(m.id) AS num_machines
        FROM machines m
        JOIN salles s ON m.salleid = s.id
        GROUP BY s.id, s.libelle;');
        foreach($results as $res){
            array_push($x, $res->libelle);
            array_push($y, $res->num_machines);
        }
        return view('chart')->with('x',$x)->with('y',$y);
    }
}
