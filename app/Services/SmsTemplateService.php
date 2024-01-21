<?php

declare(strict_types=1);

namespace App\Services;

use App\SmsTemplate;
use App\Repositories\SmsTemplateRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SmsTemplateService
{
    public function __construct(
        private readonly SmsTemplateRepository $smsTemplateRepository
    ) {
    }

    public function getSmsTemplates()
    {
        return $this->smsTemplateRepository->all();
    }

    public function store(array $data): ?SmsTemplate
    {
        return $this->smsTemplateRepository->create($data);
    }
    public function update(array $data, $id): ?bool
    {
        return $this->smsTemplateRepository->update($data, $id);
    }
    public function findById($id): ?SmsTemplate
    {
        return $this->smsTemplateRepository->show($id);
    }
    public function delete($id): ?bool
    {
        return $this->smsTemplateRepository->delete($id);
    }
}
