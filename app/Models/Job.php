<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'id', 'name', 'media_id', 'job_category_id', 'job_type_id', 'description', 'detail', 'business_skill',
        'knowledge', 'location', 'activity', 'academic_degree_doctor', 'academic_degree_master', 'academic_degree_professional',
        'academic_degree_bachelor', 'salary_statistic_group', 'salary_range_first_year', 'salary_range_average',
        'salary_range_remarks', 'restriction', 'estimated_total_workers', 'remarks', 'url', 'seo_description',
        'seo_keywords', 'sort_order', 'publish_status', 'version',
        'created_by', 'created_at', 'modified_at', 'deleted_at',
    ];

    public function JobsPersonality()
    {
        return $this->hasMany(JobPersonality::class);
    }

    public function JobPracticalSkill()
    {
        return $this->hasMany(JobPracticalSkill::class);
    }

    public function JobBasicAbility()
    {
        return $this->hasMany(JobBasicAbility::class);
    }

    public function JobTool()
    {
        return $this->hasMany(JobTool::class);
    }

    public function JobToolNotNull()
    {
        return $this->JobTool()->whereNull('deleted_at');
    }

    public function JobCareerPath()
    {
        return $this->hasMany(JobCareerPath::class);
    }

    public function JobRecQualification()
    {
        return $this->hasMany(JobRecQualification::class);
    }

    public function JobCategory()
    {
        return $this->hasMany(JobCategory::class);
    }

    public function JobCategoryNotNull()
    {
        return $this->JobCategory()->whereNull('deleted_at');
    }

    public function JobType()
    {
        return $this->hasMany(JobType::class);
    }

    public function JobTypeNotNull()
    {
        return $this->JobType()->whereNull('deleted_at');
    }
}
