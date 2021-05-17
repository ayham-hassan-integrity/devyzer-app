<?php

namespace App\Http\Livewire;

use App\Domains\SecondEntity\Models\Secondentity;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class SecondentityTable.
 */
class SecondentityTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'id';

    /**
     * @var string
     */
    public $status;

    /**
     * @param string $status
     */
    public function mount($status = null): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Secondentity::query();

        if ($this->status === 'deleted') {
            return $query->onlyTrashed();
        }

        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('id'), 'id')
,
            Column::make(__('test'), 'test')
,
            Column::make(__('test2'), 'test2')
,

            Column::make(__('Actions'))
                ->format(function (Secondentity $model) {
                    return view('backend.second-entity.includes.actions',  ['secondentity' => $model]);
                })
        ];
    }
}