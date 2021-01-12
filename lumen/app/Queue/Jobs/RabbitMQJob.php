<?php
namespace App\Queue\Jobs;

use App\Events\ConsumePeopleEvent;
use App\Events\ConsumeShipOrderEvent;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;
class RabbitMQJob extends BaseJob
{
    /**
     * Fire the job.
     *
     * @return void
     */
    public function fire()
    {
        try{
            $payload = $this->getRawBody();
            $payloadExploded = explode('/',$payload);
            if($payloadExploded[2]=='people.xml'){
                $class = ConsumePeopleEvent::class;
            }else{
                $class = ConsumeShipOrderEvent::class;
            }
            $method = 'handle';
            $this->instance = $this->resolve($class)->{$method}($this, $payload);
            
            //Criamos um e-mail para mandar para o usuário que fez o upload
            $this->release();
        }catch(Exception $ex){
            var_dump($ex);
            $this->reject();
        }
    }
}