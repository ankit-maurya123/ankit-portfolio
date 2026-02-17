<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'title', 'description', 'image', 'technologies',
        'project_url', 'github_url', 'category', 'is_featured',
        'status', 'sort_order'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActiveProjects()
    {
        return $this->where('status', 'active')
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    public function getFeaturedProjects()
    {
        return $this->where('status', 'active')
                    ->where('is_featured', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    public function getProjectsByCategory($category)
    {
        return $this->where('status', 'active')
                    ->where('category', $category)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    public function getTechnologiesArray($project)
    {
        return array_map('trim', explode(',', $project['technologies']));
    }
}
