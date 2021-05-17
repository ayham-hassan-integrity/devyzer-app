<?php

namespace App\Domains\FirstEntity\Services;

use App\Domains\FirstEntity\Models\Firstentity;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class FirstentityService.
 */
class FirstentityService extends BaseService
{
    /**
     * FirstentityService constructor.
     *
     * @param Firstentity $firstentity
     */
    public function __construct(Firstentity $firstentity)
    {
        $this->model = $firstentity;
    }

    /**
     * @param array $data
     *
     * @return Firstentity
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Firstentity
    {
        DB::beginTransaction();

        try {
            $firstentity = $this->model::create([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this firstentity. Please try again.'));
        }

        DB::commit();

        return $firstentity;
    }

    /**
     * @param Firstentity $firstentity
     * @param array $data
     *
     * @return Firstentity
     * @throws \Throwable
     */
    public function update(Firstentity $firstentity, array $data = []): Firstentity
    {
        DB::beginTransaction();

        try {
            $firstentity->update([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this firstentity. Please try again.'));
        }

        DB::commit();

        return $firstentity;
    }

    /**
     * @param Firstentity $firstentity
     *
     * @return Firstentity
     * @throws GeneralException
     */
    public function delete(Firstentity $firstentity): Firstentity
    {
        if ($this->deleteById($firstentity->id)) {
            return $firstentity;
        }

        throw new GeneralException('There was a problem deleting this firstentity. Please try again.');
    }

    /**
     * @param Firstentity $firstentity
     *
     * @return Firstentity
     * @throws GeneralException
     */
    public function restore(Firstentity $firstentity): Firstentity
    {
        if ($firstentity->restore()) {
            return $firstentity;
        }

        throw new GeneralException(__('There was a problem restoring this  Firstentities. Please try again.'));
    }

    /**
     * @param Firstentity $firstentity
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Firstentity $firstentity): bool
    {
        if ($firstentity->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Firstentities. Please try again.'));
    }
}