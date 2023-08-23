<?php

namespace App\Imports;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $listFaculties = [
        'is' => 'School of Information Systems',
        'cs' => 'School of Computer Science',
        'ec' => 'Faculty of Economics and Communication',
        'biz' => 'Binus Business School',
        'mng' => 'Management',
        'deez' => 'School of Design',
        'engi' => 'Faculty of Engineering'
    ];

    public function getFacultyCol($region) {
        $idx = -1;

        switch($region) {
            case "Alam Sutera" :
                $idx = 22;
                break;
            case "Bandung" :
                $idx = 30;
                break;
            case "Kemanggisan" :
                $idx = 14;
                break;
            case "Malang" :
                $idx = 34;
                break;
        }

        return $idx;
    }

    public function getJurusanCol($faculty, $region) {
        $idx = -1;

        $listFaculty = $this->listFaculties;

        if($region === "Alam Sutera") {
            switch($faculty) {
                case $listFaculty['is'] :
                    $idx = 29;
                    break;
                case $listFaculty['cs'] :
                    $idx = 27;
                    break;
                case $listFaculty['ec'] :
                    $idx = 24;
                    break;
                case $listFaculty['biz'] :
                    $idx = 23;
                    break;
            }
        } else if ($region === "Bandung") {
            switch($faculty) {
                case $listFaculty['deez'] :
                    $idx = 33;
                    break;
                case $listFaculty['cs'] :
                    $idx = 32;
                    break;
                case $listFaculty['biz'] :
                    $idx = 31;
                    break;
            }
        } else if ($region === "Kemanggisan") {
            switch($faculty) {
                case $listFaculty['is'] :
                    $idx = 21;
                    break;
                case $listFaculty['cs'] :
                    $idx = 19;
                    break;
                case $listFaculty['ec'] :
                    $idx = 16;
                    break;
                case $listFaculty['biz'] :
                    $idx = 15;
                    break;
            }
        }else if ($region === "Malang") {
            switch($faculty) {
                case $listFaculty['deez'] :
                    $idx = 37;
                    break;
                case $listFaculty['cs'] :
                    $idx = 36;
                    break;
                case $listFaculty['biz'] :
                    $idx = 35;
                    break;
            }
        }

        return $idx;
    }

    public function getLntCourseCol($region) {
        $idx = -1;
        if($region === "Alam Sutera") {
            $idx = 49;
        } else if ($region === "Bandung") {
            $idx = 51;
        } else if ($region === "Kemanggisan") {
            $idx = 47;
        }else if ($region === "Malang") {
            $idx = 54;
        }

        return $idx;
    }

    public function getLaunchingCol($region) {
        $idx = -1;
        if($region === "Alam Sutera") {
            $idx = 50;
        } else if ($region === "Bandung") {
            $idx = 52;
        } else if ($region === "Kemanggisan") {
            $idx = 48;
        }else if ($region === "Malang") {
            $idx = 55;
        }

        return $idx;
    }

    public function getTrialCol($region) {
        $idx = -1;

        if ($region === "Bandung") {
            $idx = 53;
        }

        return $idx;
    }

    public function model(array $row)
    {

        if($row[13] !== "Kemanggisan") {
            return;
        }
        $userfacul = $row[$this->getFacultyCol($row[13])];

        $date = strtotime($row[4]);

        return new User([
        'fullName' => $row[2],
        'gender' => $row[3],
        'birthDate' => date('Y-m-d', $date),
        'placeBirth' => ($row[56] === null) ? $row[5] : $row[56],
        'domicile' => $row[5],
        'address' => $row[6],
        'line_id' => $row[7],
        'whatsapp' => $row[8],
        'instagram' => $row[9],
        'agama' => $row[10],
        //Step 2
        'nim' => $row[11],
        'campus_region' => $row[13],
        'faculty' => $userfacul,
        'major' => ($this->getJurusanCol($userfacul, $row[13]) === -1) ? 'Empty' : $row[$this->getJurusanCol($userfacul, $row[13])],
        'batch' => $row[12],
        //Step 3
        'launching_schedule' => ($this->getLaunchingCol($row[13])  === -1 )? null : $row[$this->getLaunchingCol($row[13])],
        'lnt_course' => ($this->getLntCourseCol($row[13]) === -1) ? null : $row[$this->getLntCourseCol($row[13])],
        'trial_class' => ($this->getTrialCol($row[13]) === -1) ? null : $row[$this->getTrialCol($row[13])],
        //Step 4
        'registration_source' => 'expo',
        'email' => $row[1],
        'password' => Hash::make('vivaBNCC'.date('d', $date) . date('m', $date) . date('Y', $date). '!'),
        'created_at' => $row[0]
        ]);
    }
}
