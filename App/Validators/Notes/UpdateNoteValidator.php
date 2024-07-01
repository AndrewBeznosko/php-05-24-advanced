<?php

namespace App\Validators\Notes;

use App\Enums\DB\SQL;
use App\Models\Note;

class UpdateNoteValidator extends Base
{
    protected static array $rules = [
        'title' => '/[\w\s\(\)\-]{3,}/i',
        'folder_id' => '/\d+/i'
    ];

    protected static array $errors = [
        'title' => 'Title should contain only characters, numbers and _-() and has length more than 2 symbols',
        'folder_id' => '[folder_id] should be exists and has type integer'
    ];


    public static function validate(array $fields = []): bool
    {
        $result = [
            static::isNoteExists($fields['id']),
            parent::validate($fields),
            static::validateFolderId($fields['folder_id']),
            static::isBoolean($fields, 'pinned'),
            static::isBoolean($fields, 'completed')
        ];

        return !in_array(false, $result);
    }

    public static function isNoteExists(int $id): bool
    {
        $exists = Note::where('id', SQL::EQUAL, $id)->exists();

        if (!$exists) {
            static::setError('id', "Note with id $id does not exists!");
        }

        return $exists;
    }
}