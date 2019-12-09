<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Depertement;

/**
 * Class DepertementTransformer.
 *
 * @package namespace App\Transformers;
 */
class DepartmentTransformer extends TransformerAbstract
{
    /**
     * Transform the Depertement entity.
     *
     * @param \App\Entities\Depertement $model
     *
     * @return array
     */
    public function transform(Depertement $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
