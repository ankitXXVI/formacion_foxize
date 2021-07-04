<?php


namespace RotateApp\Shared\Infraestructure\Bus\Command;


use ReflectionMethod;
use ReflectionParameter;
use RotateApp\Shared\Domain\Bus\Command\Command;
use RotateApp\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class InMemoryCommandBus implements CommandBus
{
    private MessageBus $bus;

    public function __construct(iterable $commandHandlers, iterable  $commandMiddleware)
    {
        $middlwares = [];
        foreach ($commandMiddleware as $middlware)
        {
            $middlwares[]=$middlware;

        }

        $handlers = $this->getHandlers($commandHandlers);
        $this->bus = new MessageBus(array_merge($middlwares,
            [
                new HandleMessageMiddleware(
                    new HandlersLocator($handlers)
                )
            ]
            )
        );
    }

    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } catch (\Exception $error) {
            throw $error->getPrevious() ?? $error;
        }
    }

    private function getHandlers(iterable $commandHandlers): array
    {
        $handlers = [];
        foreach ($commandHandlers as $commandHandler)
        {
            $handler = $this->extract($commandHandler);
            $handlers = array_merge($handlers,$handler);
        }
        return $handlers;

    }

    private function extract($class): ?array
    {
        $reflector = new \ReflectionClass($class);
        /**
         * @var ReflectionMethod $method
         */
        try {
            $method = $reflector->getMethod('__invoke');
            if($method->getNumberOfParameters() === 1){
                /**
                 * @var ReflectionParameter $reflectionParameter
                 */
                $reflectionParameter = $method->getParameters()[0];
                return [$reflectionParameter->getType()->getName()=>[$class]];
            }

        } catch (\ReflectionException $e) {
            return null;
        }

    }


}