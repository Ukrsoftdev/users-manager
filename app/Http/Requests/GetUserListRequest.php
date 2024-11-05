<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class GetUserListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'limit' => [
                'integer',
                'min:1',
                'sometimes'
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->get('limit')) {
            $this->merge(['limit' => (int)$this->get('limit')]);
        }
    }
}
