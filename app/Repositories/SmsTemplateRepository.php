<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\SmsTemplate;
use Image;

class SmsTemplateRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return SmsTemplate::latest()->get();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = SmsTemplate::query();
        // $query->join('smsTemplate_types', 'smsTemplate_types.id', '=', 'smsTemplates.smsTemplate_type')
        //     ->select('smsTemplates.*', 'smsTemplate_types.name as smsTemplate_type_name');

        return $query->paginate($perPage);
    }

    public function create($data): ?SmsTemplate
    {
        $template = SmsTemplate::create($data);
        return $template;
    }

    public function update(array $data, $id): ?bool
    {
        $smsTemplate = SmsTemplate::find($id);
        if ($smsTemplate) {
            $smsTemplate->update($data);
            return true;
        }

        return false;
    }

    public function show($id): ?SmsTemplate
    {
        $smsTemplate = SmsTemplate::find($id);
        if ($smsTemplate) {
            return $smsTemplate;
        }

        return false;
    }
    public function delete($id): ?bool
    {
        SmsTemplate::destroy($id);
        return true;
    }
}
