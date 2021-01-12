<?php

namespace App\Events;
use DB;

class ConsumeShipOrderEvent extends Event
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
            $order = DB::table('ordens')->where('id',$row->orderid)->first();
            // Se foi vazio, inserir na base de dados
            if(empty($order)){
                //var_dump($order);
                DB::table('ordens')->insert(
                    array(
                        'id'=>$row->orderid,
                        'id_pessoa'=>$row->orderperson
                    )
                );
                // Colocamos o shipto neste local pois caso a ordem tenha o mesmo id, então também tem o mesmo destinatário
                // Isso evita duplicidade de informações
                // Não preciso fazer a verificação pois não possui ordem com esse id
                DB::table('destinatarios')->insert(
                    array(
                        'nome'=>$row->shipto->name,
                        'endereco'=>$row->shipto->address,
                        'cidade'=>$row->shipto->city,
                        'pais'=>$row->shipto->country,
                        'id_ordem'=>$row->orderid
                    )
                );
                foreach($row->items->item as $item){
                    DB::table('itens')->insert(
                        array(
                            'titulo'=>$item->title,
                            'descricao'=>$item->note,
                            'quantidade'=>$item->quantity,
                            'preco'=>$item->price,
                            'id_ordem'=>$row->orderid
                        )
                    );
                }
            }
        }
    }
}
