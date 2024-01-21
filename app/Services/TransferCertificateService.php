<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\TransferCertificateRepository;
use App\TransferCertificate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TransferCertificateService
{
    public function __construct(
        private readonly TransferCertificateRepository $TransferCertificateRepository,

    ) {
    }

    public function getTCs(): Collection
    {
        return $this->TransferCertificateRepository->all();
    }



    // public function getTCss(array $filter = []): LengthAwarePaginator
    // {
    //     return $this->TransferCertificateRepository->paginate(20, $filter);
    // }

    public function findTCsById(int $id): ?TransferCertificate
    {
        return $this->TransferCertificateRepository->show($id);
    }

    public function create(array $data): ?TransferCertificate
    {
        return $this->TransferCertificateRepository->create($data);
    }

    public function updateTCs(array $data, int $id): ?TransferCertificate
    {
        return $this->TransferCertificateRepository->update($data, $id);
    }
    public function deleteTCsById(int $id)
    {
        return $this->TransferCertificateRepository->delete($id);
    }
    
}
