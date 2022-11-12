<?php

namespace App\Jambasangsang;

use Spatie\Permission\Models\Role;

use App\Jambasangsang\constants\ConstPerPageNumber;
use App\Jambasangsang\constants\ConstPerPageWord;

class Helper
{
    public static function getStatusValue(String $status)
    {
        switch ($status) {
            case 0:
                return    "";
                break;

            default:
                return    "checked";
                break;
        }
    }

     public static function getGenderValue(String $gender)
     {
         switch ($gender) {
             case 'F':
                 return    "Female";
                 break;

             default:
                 return    "Male";
                 break;
         }
     }

     public static function getStatus()
     {
         return [
             '' => 'Select',
             '1' => 'Active',
             '0' => 'InActive',
         ];
     }

     public static function getGender()
     {
         return [
             '' => 'Select',
             '1' => 'Male',
             '0' => 'Female',
         ];
     }

     public static function getReligion()
     {
         return [
             '' => 'Select',
             '1' => 'Muslim',
             '2' => 'Christian',
             '3' => 'Jew',
             '4' => 'Hindu',
         ];
     }

     public static function getRoles()
     {
         return Role::orderBy('id', 'asc')->where('name', '!=', 'patient')->get(['id', 'name']);
     }

     public static function getPerPageNumber()
     {
         return [
            constPerPageNumber::All => constPerPageWord::All,
            constPerPageNumber::Five => constPerPageWord::Five,
            constPerPageNumber::Ten => constPerPageWord::Ten,
            constPerPageNumber::Fifteen => constPerPageWord::Fifteen,
            constPerPageNumber::TwentyFive => constPerPageWord::TwentyFive,
            constPerPageNumber::SeventyFive => constPerPageWord::SeventyFive,
            constPerPageNumber::Hundred => constPerPageWord::Hundred,
         ];
     }
}
