<?php

namespace App\Models;

use Core\Model;

class Folder extends Model
{
    public int $user_id;
    public string $title, $created_at, $updated_at;
    public ?string $deleted_at = null;

    protected function table(): string
    {
        return 'folders';
    }
}