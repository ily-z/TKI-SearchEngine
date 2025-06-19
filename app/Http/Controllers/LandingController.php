<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;



class LandingController extends Controller
{
    public function __construct() {
        //echo "<h1>class called</h1>";
    }
    public function search(Request $request)
    {
        // $query = $request->input('q');
        // $rank = $request->input('rank');
        $query = $request->get('q');
        $rank = $request->get('rank');

     

        // $process = new Process([
        //     'py', 
        //     'query.py', 
        //     'indexdb.php', 
        //     $rank, 
        //     $query 
        // ]);

        // $process->run();
        

        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);`
        // }
        //var_dump($_GET);
        $command = 'python query2.py imdb_index.php '. $rank.' ' .$query;
        //echo $command;
        $dataexec=str_replace('"',"'",shell_exec($command));
        //var_dump($dataexec);
        $dataexec2=str_replace("'",'"',$dataexec);      // $dataexec = shell_exec("python query.py indexdb.php $rank $query");
        //var_dump($dataexec2);;
        $list_data = array_filter(explode("\n", $dataexec2));       
        //var_dump($list_data);
          
        $data = [];

       

        foreach ($list_data as $book) {
            $dataj =  json_decode($book, true);
            //var_dump($dataj);
            array_push($data, '
            <div class="col-lg-10">
                <div class="card mb-2 bg-light">
                    <div style="display: flex; flex: 1 1 auto;">
                        
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">Tilte: '.$dataj['title'].' </h4>
                            <h5 class="card-title">Rank: '.$dataj['url'].' </h5>
                            <p class="card-text">Rating: '.$dataj['rating'].' </p>
                            <p class="card-text">Year: '.$dataj['year'].' </p>
                            <p class="card-text">runtime: '.$dataj['runtime'].' </p>

                            
                        </div>
                    </div>
                
                </div>
            </div>
            ');
        };
        foreach ($data as $key => $value) {
            echo $value;
        }
    }
}

