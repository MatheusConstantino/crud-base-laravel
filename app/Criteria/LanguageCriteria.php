<?php

namespace RW940cms\Criteria;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use App;
use Session;
/**
 * Class WhereNoticiasCriteria
 * @package namespace PainelCursos\Criteria;
 */
class LanguageCriteria implements CriteriaInterface
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
      
      return $model->where('locale','=',App::getLocale());
    }
}
