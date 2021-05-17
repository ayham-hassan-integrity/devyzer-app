<?php

namespace App\Http\Livewire;

use App\Domains\FirstEntity\Models\Firstentity;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class FirstentityTable.
 */
class FirstentityTable extends TableComponent
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
        $query = Firstentity::query();

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
            Column::make(__('name'), 'name')
,
            Column::make(__('id'), 'id')
,
            Column::make(__('mobile'), 'mobile')
,

            Column::make(__('Actions'))
                ->format(function (Firstentity $model) {
                    return view('backend.first-entity.includes.actions',  ['firstentity' => $model]);
                })
        ];
    }
}