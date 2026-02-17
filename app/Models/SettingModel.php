<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['key_name', 'value', 'type', 'group_name'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getValue($key)
    {
        $setting = $this->where('key_name', $key)->first();
        return $setting ? $setting['value'] : null;
    }

    public function setValue($key, $value)
    {
        $setting = $this->where('key_name', $key)->first();

        if ($setting) {
            return $this->update($setting['id'], ['value' => $value]);
        }

        return $this->insert([
            'key_name' => $key,
            'value' => $value,
        ]);
    }

    public function getByGroup($group)
    {
        return $this->where('group_name', $group)->findAll();
    }

    public function getAllSettings()
    {
        $settings = $this->findAll();
        $result = [];

        foreach ($settings as $setting) {
            $result[$setting['key_name']] = $setting['value'];
        }

        return $result;
    }

    public function getProfileSettings()
    {
        $settings = $this->getAllSettings();

        return [
            'name' => $settings['owner_name'] ?? 'Portfolio',
            'profession' => $settings['profession'] ?? 'Developer',
            'email' => $settings['email'] ?? '',
            'phone' => $settings['phone'] ?? '',
            'location' => $settings['location'] ?? '',
            'about' => $settings['about'] ?? '',
            'github' => $settings['github'] ?? '#',
            'linkedin' => $settings['linkedin'] ?? '#',
            'twitter' => $settings['twitter'] ?? '#',
            'instagram' => $settings['instagram'] ?? '#',
            'projects_done' => $settings['projects_done'] ?? '0',
            'happy_clients' => $settings['happy_clients'] ?? '0',
            'years_experience' => $settings['years_experience'] ?? '0',
        ];
    }
}
