<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Se Agrega _____________________________________________________________
use App\Http\Controllers\Controller;
use App\Trainer;
use Barryvdh\DomPDF\Facade as PDF;
#_______________________________________________________________________


class TrainerController extends Controller
{
      public function imprimir(){
        
        $trainers=Trainer::all();
        $pdf=PDF::loadView('ejemplo',compact('trainers'));
        return $pdf->stream('ejemplo.pdf');
    }
     /**public function imprimirind($id){
        $trainers=Trainer::findOrFail($id);
        $pdf=PDF::loadView('ejemplo',compact('trainers'));
        return $pdf->download('ejemplo.pdf');
     
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers=Trainer::all();
        return view('index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #return $request->all();
        #return $request->input('name');
        /*$trainer = new Trainer();
        $trainer->name=$request->input('name');
        $trainer->save();
        return 'Guardado';
        */
        

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            
            $trainer = new Trainer();
            $trainer -> name = $request -> input('name');
            $trainer -> apellido = $request -> input('apellido');
            //imagen
            $trainer -> avatar = $name;
            $trainer -> save();
            return 'Guardado';
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //return view("show");
        //$trainer = Trainer::find($id);
        //return $trainer;
        return view('show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        if ($request->hasFile('avatar')) {
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();

            //imagen
            $trainer->avatar=$name;
            $file->move(public_path( ).'/images/',$name);
            # code...
        }
        $trainer->save();
        return redirect('trainers/');

        //$trainer->fill($request->all());
        //$trainer->save( );
        //return "update";
        //return $request;
        //return $trainer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**$trainer = Trainer::find($id);
        if ($trainer->delete($id))
        {
            return redirect('trainers/');
        }
        else return 'El '.$id." No se pudo borrar";
        */

        $data = Trainer::FindOrFail($id);
        if(file_exists('images/'.$data->avatar) AND !empty($data->avatar)){
            unlink('images/'.$data->avatar);
        }
        try{

            $data->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }
        if($bug==0){
            echo "Bien";
            return redirect('trainers/');
        }else{
            echo "Mal";
        }
      

    }
}
