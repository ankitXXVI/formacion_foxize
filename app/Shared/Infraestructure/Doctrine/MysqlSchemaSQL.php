<?php


namespace RotateApp\Shared\Infraestructure\Doctrine;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use RotateApp\Backoffice\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use RotateApp\Backoffice\Shared\Infrastructure\Doctrine\DoctrinePrefixesSearcher;

class MysqlSchemaSQL
{

    private EntityManager $em;

    /**
     * MysqlSchemaSQL constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function __invoke(): array
    {
        $loadedMetadata = [];
        $allClassNames = DoctrineEntityManagerFactory::getMetadataDriver(DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../Backoffice', 'RotateApp\Backoffice'), [])->getAllClassNames();
        foreach ($allClassNames as $class)
        {
            $loadedMetadata[] = $this->em->getClassMetadata($class);
        }
        $schemaTool = new SchemaTool($this->em);
        return $schemaTool->getUpdateSchemaSql($loadedMetadata);
    }


}