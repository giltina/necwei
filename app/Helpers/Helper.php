<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Employer;

class Helper {

    public static function employerHelper($trow, $length = 4, $sector){
        $date = Carbon::now()->format('Y');
        $sectordb = DB::table('sectors')->where('id', $sector)->first();
        $prefix = $sectordb->name;
        $string = $prefix;
        preg_match_all('/\b\w/', $string, $matches);
        $firstLetters = implode('', $matches[0]);
        $data = DB::table('employers')->orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($trow, strlen($prefix)+1); /**ignore this line **/
            $actial_last_number = $code;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $firstLetters.'-'.$zeros.$data?->id.'-'.$date;
    }

    public static function employeeHelper($employerId){
        
        $data = DB::table('employees')->orderBy('id','desc')->first();
        $employer = Employer::find($employerId);
        $employerNumber = $employer->registration_number;
       
        return $employerNumber.'-'.$data?->id;
    }

    



}

?>