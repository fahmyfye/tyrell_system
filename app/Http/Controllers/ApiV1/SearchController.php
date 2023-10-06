<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Check if job exists
        // return $request->all();

        // Check results
        $result = Job::where('publish_status', 1)
            ->whereLike([
                'name'                   => $request->search,
                'description'            => $request->search,
                'detail'                 => $request->search,
                'business_skill'         => $request->search,
                'knowledge'              => $request->search,
                'location'               => $request->search,
                'activity'               => $request->search,
                'salary_statistic_group' => $request->search,
                'salary_range_remarks'   => $request->search,
                'restriction'            => $request->search,
                'remarks'                => $request->search,
            ])
            ->with([
                'JobsPersonality',
                'JobPracticalSkill',
                'JobBasicAbility',
                'JobTool',
                'JobCareerPath',
                'JobRecQualification',
                'JobCategoryNotNull',
                'JobTypeNotNull'
            ])
            ->whereNull('deleted_at')
            ->groupBy('id')
            ->orderBy('sort_order', 'desc')
            ->orderBy('id', 'desc')
            ->limit(50)
            ->get([
                'id', 'name', 'media_id', 'job_category_id', 'job_type_id', 'description', 'detail', 'business_skill',
                'knowledge', 'location', 'activity', 'academic_degree_doctor', 'academic_degree_master', 'academic_degree_professional',
                'academic_degree_bachelor', 'salary_statistic_group', 'salary_range_first_year', 'salary_range_average',
                'salary_range_remarks', 'restriction', 'estimated_total_workers', 'remarks', 'url', 'seo_description',
                'seo_keywords', 'sort_order', 'publish_status', 'version',
                'created_by', 'created_at', 'modified_at', 'deleted_at',
            ]);

        return response()->json([
            'status' => 'success',
            'result' => $result
        ]);
    }
}
