<?php

namespace App\Events;
use DB;

class ConsumePeopleEvent extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle($job,$data){
        $xml = simplexml_load_file(env('FILE_BASEPATH').''.$data);
        foreach($xml as $row){
            $person = DB::table('pessoas')->where('id',$row->personid)->first();
            // Se foi vazio, inserir na base de dados
            if(empty($person)){
                DB::table('pessoas')->insert(
                    array(
                        'id'=>$row->personid,
                        'nome'=>$row->personname
                    )
                );
            }
            foreach($row->phones->phone as $telefone){
                $phone = DB::table('telefones')->where('id_pessoa',$row->personid)->where('telefone',$telefone)->first();
                if(empty($phone)){
                    DB::table('telefones')->insert(
                        array(
                            'telefone'=>$telefone,
                            'id_pessoa'=>$row->personid
                        )
                    );
                }
            }
        }
    }
}
