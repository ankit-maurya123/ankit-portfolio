<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'name', 'position', 'company', 'image',
        'testimonial', 'rating', 'sort_order', 'status'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActiveTestimonials()
    {
        return $this->where('status', 'active')
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }
}
