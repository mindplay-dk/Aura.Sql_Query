<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @package Aura.Sql_Query
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql_Query\Common;

use Aura\Sql_Query\AbstractQuery;
use Aura\Sql_Query\Traits;

/**
 *
 * An object for DELETE queries.
 *
 * @package Aura.Sql_Query
 *
 */
class Delete extends AbstractQuery implements DeleteInterface
{
    use Traits\WhereTrait;
    
    /**
     *
     * The table to delete from.
     *
     * @var string
     *
     */
    protected $from;

    /**
     *
     * Sets the table to delete from.
     *
     * @param string $table The table to delete from.
     *
     * @return $this
     *
     */
    public function from($table)
    {
        $this->from = $this->quoteName($table);
        return $this;
    }
    
    /**
     * 
     * Builds this query object into a string.
     * 
     * @return string
     * 
     */
    protected function build()
    {
        $this->stm = 'DELETE';
        $this->buildFlags();
        $this->buildFrom();
        $this->buildWhere();
        return $this->stm;
    }
    
    /**
     * 
     * Builds the FROM clause.
     *
     * @return null
     * 
     */
    protected function buildFrom()
    {
        $this->stm .= " FROM {$this->from}";
    }
}
