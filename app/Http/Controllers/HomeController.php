<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Alquilers;

use App\Models\Actor;
use App\Models\ActorPelicula;
use App\Models\Alquiler;
use App\Models\Director;
use App\Models\Formato;
use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\Sexo;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use http\Controllers\auth;
use PDF;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function movie()
    {
        $peliculas = Pelicula::all();
        $generos = Genero::all();
        $data = [];
        
        $data['data'] = json_encode($data);
        return view('reports.movie',[
            'peliculas' => $peliculas,
            'generos'=>$generos
        ],$data);
    }
    public function partner()
    {
        $socios = Socio::all();
        return view('reports.partner',[
            'socios'=>$socios
        ]);
    }

    public function rental()
    {
        $alquileres = Alquiler::all();
        $generos=Genero::all();
        return view('reports.rental',[
            'alquileres'=>$alquileres,
            'generos'=>$generos
        ]);
    }

    public function economy()
    {
        $peliculas = Pelicula::all();
        $alquileres = Alquiler::all();
        return view('reports.economy',[
            'peliculas'=>$peliculas,
            'alquileres'=>$alquileres
        ]);
    }

    public function movieRental()
    {
        $peliculas = Pelicula::all();
        $alquileres = Alquiler::all();
        return view('reports.movieRental',[
            'peliculas'=>$peliculas,
            'alquileres'=>$alquileres
        ]
        );
    }

    public function economyPDF()
    {
        $alquileres = Alquiler::paginate();
        
        $pdf = PDF::loadView('pdfs.economy',['alquileres'=>$alquileres]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function movieRentalPDF()
    {
        $peliculas = Pelicula::all();
        $alquileres = Alquiler::all();
        return view('pdfs.movieRental',[
            'peliculas'=>$peliculas,
            'alquileres'=>$alquileres
        ]
        );
    }





    public function index()
    {
        
        $num_actor = Actor::all()->count();
        $num_actorPelicula = ActorPelicula::all()->count();
        $num_alquiler = Alquiler::all()->count();
        $num_director = Director::all()->count();
        $num_formato = Formato::all()->count();
        $num_genero = Genero::all()->count();
        $num_pelicula = Pelicula::all()->count();
        $num_sexo = Sexo::all()->count();
        $num_socio = Socio::all()->count();
        $num_user = User::all()->count();
        // CONSULTAS 
        //Numero de usuarios registradospor mes
        $enero = Socio::whereBetween('created_at',['2022-01-01','2022-02-01'])->count();
        $febrero =Socio::whereBetween('created_at',['2022-02-01','2022-03-01'])->count();
        $marzo =Socio::whereBetween('created_at',['2022-03-01','2022-04-01'])->count();
        $abril =Socio::whereBetween('created_at',['2022-04-01','2022-05-01'])->count();
        $mayo =Socio::whereBetween('created_at',['2022-05-01','2022-06-01'])->count();
        $junio =Socio::whereBetween('created_at',['2022-06-01','2022-07-01'])->count();
        $julio =Socio::whereBetween('created_at',['2022-07-01','2022-08-01'])->count();
        $agosto =Socio::whereBetween('created_at',['2022-08-01','2022-09-01'])->count();
        $septiembre =Socio::whereBetween('created_at',['2022-09-01','2022-10-01'])->count();
        $octubre =Socio::whereBetween('created_at',['2022-10-01','2022-11-01'])->count();
        $noviembre =Socio::whereBetween('created_at',['2022-11-01','2022-12-01'])->count();
        $diciembre =Socio::whereBetween('created_at',['2022-12-01','2023-01-01'])->count();
        //Actores Masculinos y Femeninos
        $masculino = Actor::all()->where('sex_id',3)->count();
        $femenino =  Actor::all()->where('sex_id',4)->count();
        // peliculas alquiladas
        
        $peliculas=Pelicula::all();
        $generos = Genero::all();
        $formatos = Formato::all();
        
    
        
        $data =[];
        $dataP =[];
        

        foreach($generos as $genero){
            $data['label'][] = $genero->gen_nombre;
            $data['data'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
            
            //$data['labelP'] = Socio::all()->where('soc_nombre',$peliculas->id)->count();
        }
        foreach($formatos as $formato){
            $data['labelF'][] = $formato->for_nombre;
            $data['dataF'][] = Pelicula::all()->where('for_id',$formato->id)->count();
            //$data['labelP'] = Socio::all()->where('soc_nombre',$peliculas->id)->count();
        }
        
      
        $data['data'] = json_encode($data);
        //$dataP['data'] = json_encode($dataP);
        
        //
        $compas = Alquiler::sum('alq_valor');

        return view('home',[
            'num_actor'=>$num_actor,
            'num_actorPelicula'=>$num_actorPelicula,
            'num_alquiler'=>$num_alquiler,
            'num_director'=>$num_director,
            'num_formato'=>$num_formato,
            'num_genero'=>$num_genero,
            'num_pelicula'=>$num_pelicula,
            'num_sexo'=>$num_sexo,
            'num_socio'=>$num_socio,
            'num_user'=>$num_user,
            //Registro de usuarios
            'enero'=>$enero,
            'febrero'=>$febrero,
            'marzo'=>$marzo,
            'abril'=>$abril,
            'mayo'=>$mayo,
            'junio'=>$junio,
            'julio'=>$julio,
            'agosto'=>$agosto,
            'septiembre'=>$septiembre,
            'octubre'=>$octubre,
            'noviembre'=>$noviembre,
            'diciembre'=>$diciembre,
            //Sexo deactores
            'masculino'=>$masculino,
            'femenino'=>$femenino,

            //vistas a toda la variabe
            'peliculas'=>$peliculas,
            //valor de lasuma alquileres
            'compras'=>$compas 
        ],$data);      
    }

}
