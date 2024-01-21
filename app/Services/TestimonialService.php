<?php

declare(strict_types=1);

namespace App\Services;

use App\Testimonial;
use App\Repositories\TestimonialRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TestimonialService
{
    public function __construct(
        private readonly TestimonialRepository $testimonialRepository,
       
    ) {
    }

    public function getTestimonials(): Collection
    {
        return $this->testimonialRepository->all();
    }

    public function getTestimonialsStatuses(): array
    {
        return [
            'pending' => __('Pending'),
            'approved' => __('Approved'),
            'rejected' => __('Rejected'),
            'cancelled' => __('Cancelled'),
        ];
    }

    // public function getTestimonials(array $filter = []): LengthAwarePaginator
    // {
    //     return $this->testimonialRepository->paginate(20, $filter);
    // }

    public function findTestimonialById(int $id): ?Testimonial
    {
        return $this->testimonialRepository->show($id);
    }

    public function createTestimonial(array $data): ?Testimonial
    {
        return $this->testimonialRepository->create($data);
    }



    public function updateTestimonial(array $data, int $id): ?Testimonial
    {
        return $this->testimonialRepository->update($data, $id);

       
    }
    public function deleteTestimonialById(int $id)
    {
        return $this->testimonialRepository->delete($id);
    }
    public function updateTestimonialStatus($request, int $id): bool
    {
        return true;
        // $Testimonial->status = $request->status;
        // $Testimonial->save();
        // return $this->testimonialRepository->updateTestimonialStatus($request, $id);
    }
}
