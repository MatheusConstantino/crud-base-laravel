<?php

namespace RW940cms\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
/**
 * Class WhereNoticiasCriteria
 * @package namespace RW940cms\Criteria;
 */
class WhereServicosCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('categoria_id','=','2')->where('status','=','1');
    }
}
