<?php

namespace App\Providers;

use App\Repository\AttendanceRepositoryInterface;
use App\Repository\FeesRepositoryInterface;
use App\Repository\PaymentRepositoryInterface;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class InterFacesRepoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\interfaces', 'App\Repository\extendsForInterFace');
        $this->app->bind('App\Repository\StudentInterface', 'App\Repository\extendsForStudentInterFace');
        $this->app->bind('App\Repository\StudentPromotionRepositoryInterface', 'App\Repository\StudentPromotionRepository');
        $this->app->bind('App\Repository\StudentGraduatedRepositoryInterface', 'App\Repository\StudentGraduatedRepository');
        $this->app->bind('App\Repository\FeesRepositoryInterface',            'App\Repository\FeesRepository');
        $this->app->bind('App\Repository\FeeInvoicesRepositoryInterface',     'App\Repository\FeeInvoicesRepository');
        $this->app->bind('App\Repository\ReceiptStudentsRepositoryInterface', 'App\Repository\ReceiptStudentsRepository');
        $this->app->bind('App\Repository\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
        $this->app->bind('App\Repository\PaymentRepositoryInterface', 'App\Repository\PaymentRepository');
        $this->app->bind('App\Repository\AttendanceRepositoryInterface', 'App\Repository\AttendanceRepository');
        $this->app->bind('App\Repository\SubjectRepositoryInterface', 'App\Repository\SubjectRepository');
        $this->app->bind('App\Repository\ExamRepositoryInterface', 'App\Repository\ExamRepository');
        $this->app->bind('App\Repository\QuizzRepositoryInterface', 'App\Repository\QuizzRepository');
        $this->app->bind('App\Repository\QuestionRepositoryInterface', 'App\Repository\QuestionRepository');
        $this->app->bind('App\Repository\LibraryRepositoryInterface', 'App\Repository\LibraryRepository');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
