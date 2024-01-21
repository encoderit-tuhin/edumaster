<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\LeaveRepository;
use App\Repositories\LeaveTypesRepository;
use App\Services\LeaveService;
use Tests\TestCase;

class LeaveServiceTest extends TestCase
{
    use RefreshDatabase;

    private LeaveService $leaveService;

    public function setUp(): void
    {
        parent::setUp();

        $this->leaveService = new LeaveService(
            new LeaveTypesRepository(),
            new LeaveRepository()
        );
    }

    /**
     * @dataProvider userHasPreviousLeaveInDateRangeProvider
     */
    public function testUserHasPreviousLeaveInDateRange(
        string $fromDate,
        string $toDate,
        int $userId,
        bool $expected
    ) {
        $this->leaveService->createLeave([
            'student_id' => 1,
            'leave_type' => 1,
            'from_date' => '2023-01-01',
            'to_date' => '2023-01-05',
            'reason' => 'test',
            'status' => 1,
            'submit_by' => 1,
        ]);

        $this->assertEquals(
            $expected,
            $this->leaveService->userHasPreviousLeaveInDateRange(
                $fromDate,
                $toDate,
                $userId
            )
        );
    }

    public function userHasPreviousLeaveInDateRangeProvider()
    {
        return array(
            array(
                '2023-02-02',
                '2023-02-02',
                1,
                false,
            ),
            array(
                '2023-01-01',
                '2023-01-01',
                1,
                true,
            ),
            array(
                '2023-01-03',
                '2023-01-04',
                1,
                true,
            ),
            array(
                '2023-01-05',
                '2023-01-05',
                1,
                true,
            ),
            array(
                '2023-01-05',
                '2023-01-05',
                2,
                false,
            ),
        );
    }
}