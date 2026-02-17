<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'email', 'subject', 'message', 'is_read'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'subject' => 'required|min_length[5]|max_length[255]',
        'message' => 'required|min_length[10]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Please enter your name',
            'min_length' => 'Name must be at least 3 characters',
        ],
        'email' => [
            'required' => 'Please enter your email',
            'valid_email' => 'Please enter a valid email address',
        ],
        'subject' => [
            'required' => 'Please enter a subject',
            'min_length' => 'Subject must be at least 5 characters',
        ],
        'message' => [
            'required' => 'Please enter your message',
            'min_length' => 'Message must be at least 10 characters',
        ],
    ];

    public function getUnreadCount()
    {
        return $this->where('is_read', 0)->countAllResults();
    }

    public function markAsRead($id)
    {
        return $this->update($id, ['is_read' => 1]);
    }
}
