<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bnccid' => 'required|unique:members',
            'email_binus' => 'required|email:rfc|max:255'|'unique:members',
            'ktp_pic' => 'required|mimes:png,jpg,jpeg,pdf',
            'fyp_pic' => 'required|mimes:png,jpg,jpeg,pdf',
            'lnt_course' => 'required',
            'linkedinUrl' => 'required|unique:members',
            'githubUrl' => 'required|unique:members'
        ];
    }

    public function message()
    {
        return [
            'bnccid.required' => 'Mohon untuk mengisi BNCC ID anda!',
            'bnccid.unique' => 'BNCC ID sudah diambil',
            'email_binus.required' => 'Mohon untuk mengisi Email Kuliah anda!',
            'email_binus.email' => 'Mohon untuk mengisi email dengan format yang benar!',
            'email_binus.unique' => 'Email sudah diambil',
            'ktp_pic.required' => 'Mohon untuk mengisi KTP anda!',
            'ktp_pic.mimes' => 'File KTP harus berupa PDF atau JPG/JPEG/PNG!',
            'fyp_pic.required' => 'Mohon untuk mengisi FYP card anda',
            'fyp_pic.mimes' => 'FYP card waji harus berupa PDF atau JPG/JPEG/PNG!',
            'lnt_course.required' => 'Silahkan pilih course LnT anda!',
            'linekdinUrl.required' => 'Mohon untuk mengisi link LinkedIn anda!',
            'linekdinUrl.unique' => 'Link tersebut sudah diambil',
            'githubUrl.required' => 'Mohon untuk mengisi link GitHub anda!',
            'githubUrl.unique' => 'Link tersebut sudah diambil',
        ];
    }
}
