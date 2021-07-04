<?php


namespace RotateApp\Shared\Infraestructure\Bus\Command\Middleware;


use Psr\Log\LoggerInterface;
use RotateApp\Shared\Domain\Bus\Command\CommandMiddleware;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class LoggerMiddleware implements MiddlewareInterface,CommandMiddleware
{
    private LoggerInterface $log;

    /**
     * LoggerMiddleware constructor.
     * @param LoggerInterface $log
     */
    public function __construct(LoggerInterface $log)
    {
        $this->log = $log;
    }


    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $this->log->info(' ----->  Se va a ejecutar el command: '.get_class($envelope->getMessage()).' <-----');
        $stack->next()->handle($envelope,$stack);
        $this->log->info(' ----->  Command '.get_class($envelope->getMessage()). ' ejecutado correctamente  <-----');
        return $envelope;
    }
}