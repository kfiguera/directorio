<?php

namespace App\Http\Requests;

use App\Rules\LocationRule;
use Illuminate\Foundation\Http\FormRequest;

class DirectoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    "name" => "required",
                    "id_number" => ["required","numeric","min:7",'unique:directories,id_number'],
                    "email" => ["required",'email:rfc,dns','unique:directories,email'],
                    "phone" => ["numeric","min:12","nullable",'required_if:extension,null','unique:directories,phone'],
                    "extension" => ["numeric","min:4","nullable",'required_if:phone,null','unique:directories,extension', new LocationRule()],
                    "title_id" => "required",
                    "office_id" => "required",
                    "state_id" => "required",
                    "location_id" => "required"
                ];
            }
            case 'PUT':
            {
                return [
                    "name" => "required",
                    "id_number" => ["required","numeric","min:7",'unique:directories,id_number,'.$this->route('directory')->id],
                    "email" => ["required",'email:rfc,dns','unique:directories,email,'.$this->route('directory')->id],
                    "phone" => ["numeric","min:12","nullable",'required_if:extension,null','unique:directories,phone,'.$this->route('directory')->id],
                    "extension" => ["numeric","min:4","nullable",'required_if:phone,null','unique:directories,extension,'.$this->route('directory')->id, new LocationRule()],
                    "title_id" => "required",
                    "office_id" => "required",
                    "state_id" => "required",
                    "location_id" => "required"
                ];
            }
            default:
            {
                return [];
            }

        }

    }
}
