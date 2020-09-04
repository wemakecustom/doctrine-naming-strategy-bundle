<?php

namespace WMC\DoctrineNamingStrategyBundle\ORM;

use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;

class NamingStrategy extends UnderscoreNamingStrategy
{
    public function __construct()
    {
        parent::__construct(null, true);
    }

    /**
     * @var \Doctrine\Inflector\Inflector
     */
    static private $inflector;

    /**
     * {@inheritdoc}
     */
    public function classToTableName($className, $includePrefix = true)
    {
        $table_name = parent::classToTableName($className);

        $parts = explode('_', $table_name);
        $last = array_pop($parts);

        $last = $this->pluralize($last);
        $parts[] = $last;

        return implode('_', $parts);
    }

    private function pluralize($toPluralize)
    {
        if (class_exists('\Doctrine\Inflector\InflectorFactory')) {
            if (!static::$inflector) {
                static::$inflector = \Doctrine\Inflector\InflectorFactory::create()->build();
            }

            return static::$inflector->pluralize($toPluralize);
        } else {
            return \Doctrine\Common\Inflector\Inflector::pluralize($toPluralize);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function joinKeyColumnName($entityName, $referencedColumnName = null)
    {
        return parent::classToTableName($entityName) . '_' . ($referencedColumnName ?: $this->referenceColumnName());
    }
}
