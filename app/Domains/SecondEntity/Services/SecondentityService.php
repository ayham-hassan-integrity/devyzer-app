<?php

namespace App\Domains\SecondEntity\Services;

use App\Domains\SecondEntity\Models\Secondentity;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class SecondentityService.
 */
class SecondentityService extends BaseService
{
    /**
     * SecondentityService constructor.
     *
     * @param Secondentity $secondentity
     */
    public function __construct(Secondentity $secondentity)
    {
        $this->model = $secondentity;
    }

    /**
     * @param array $data
     *
     * @return Secondentity
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Secondentity
    {
        DB::beginTransaction();

        try {
            $secondentity = $this->model::create([
                'test' => $data['test'],
                'test2' => $data['test2'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this secondentity. Please try again.'));
        }

        DB::commit();

        return $secondentity;
    }

    /**
     * @param Secondentity $secondentity
     * @param array $data
     *
     * @return Secondentity
     * @throws \Throwable
     */
    public function update(Secondentity $secondentity, array $data = []): Secondentity
    {
        DB::beginTransaction();

        try {
            $secondentity->update([
                'test' => $data['test'],
                'test2' => $data['test2'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this secondentity. Please try again.'));
        }

        DB::commit();

        return $secondentity;
    }

    /**
     * @param Secondentity $secondentity
     *
     * @return Secondentity
     * @throws GeneralException
     */
    public function delete(Secondentity $secondentity): Secondentity
    {
        if ($this->deleteById($secondentity->id)) {
            return $secondentity;
        }

        throw new GeneralException('There was a problem deleting this secondentity. Please try again.');
    }

    /**
     * @param Secondentity $secondentity
     *
     * @return Secondentity
     * @throws GeneralException
     */
    public function restore(Secondentity $secondentity): Secondentity
    {
        if ($secondentity->restore()) {
            return $secondentity;
        }

        throw new GeneralException(__('There was a problem restoring this  Secondentities. Please try again.'));
    }

    /**
     * @param Secondentity $secondentity
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Secondentity $secondentity): bool
    {
        if ($secondentity->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Secondentities. Please try again.'));
    }
}