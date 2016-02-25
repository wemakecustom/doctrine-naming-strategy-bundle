<?php

namespace WMC\DoctrineNamingStrategyBundle\ORM;

use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Doctrine\Common\Inflector\Inflector;

class NamingStrategy extends UnderscoreNamingStrategy
{
    /**
     * {@inheritdoc}
     */
    public function classToTableName($className, $includePrefix = true)
    {
        $table_name = parent::classToTableName($className);

        $parts = explode('_', $table_name);
        $last = array_pop($parts);

        $last = Inflector::pluralize($last);
        $parts[] = $last;

        return implode('_', $parts);
    }

    /**
     * {@inheritdoc}
     */
    public function joinKeyColumnName($entityName, $referencedColumnName = null)
    {
        return parent::classToTableName($entityName) . '_' . ($referencedColumnName ?: $this->referenceColumnName());
    }
}
