<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;

const MONTHS = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

class MainController extends BaseController
{

    /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function __invoke( Request $request ){
        //
    }

    /**
    * Show homepage.
    *
    * @return \Illuminate\Http\Response
    */
    public function homepage(){
        return view( 'homepage' );
    }

    /**
    * Take input from form and redirect
    *
    * @param \Illuminate\Http\Request $request
    */
    public function form( Request $request ){
        return redirect( 'paydays/' . $request->input( 'year' ) );
    }

    /**
    * Calculate payment dates for sales staff.
    *
    * @param {string} $inputYear
    * @return \Illuminate\Http\Response
    */
    public function paydays( $inputYear ){
        $salaryPayDays = $this->calculateSalaryPaydays( $inputYear );
        $bonusPayDays = $this->calculateBonusPaydays( $inputYear );

        return view( 'paydays' )
        ->with( 'year', $inputYear )
        ->with( 'salaryPayDays', $salaryPayDays )
        ->with( 'bonusPayDays', $bonusPayDays );
    }

    /**
    * Generate CSV output
    * @param {string} $inputYear
    */
    public function generate( $inputYear ){
        $salaryPayDays = $this->calculateSalaryPaydays( $inputYear );
        $bonusPayDays = $this->calculateBonusPaydays( $inputYear );

        $fileName = 'paydays-' . $inputYear .'.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
        );

        $columns = [ 'Month', 'Salary payday', 'Bonus payday' ];

        $callback = function() use( $salaryPayDays, $bonusPayDays, $columns ) {
            $file = fopen( 'php://output', 'w' );
            fputcsv( $file, $columns );

            foreach( $salaryPayDays as $month => $payday ){
                $row[ 'Month' ] = $month;
                $row[ 'Salary payday' ] = $payday;
                $row[ 'Bonus payday' ] = $bonusPayDays[ $month ];

                fputcsv( $file, [ $row[ 'Month' ], $row[ 'Salary payday' ], $row[ 'Bonus payday' ] ] );
            }

            fclose( $file );
        };

        return response()->stream( $callback, 200, $headers );
    }

    /**
    * Calculate payment dates for sales staff.
    *
    * @param {string} $inputYear
    * @return \Illuminate\Http\Response
    */
    public function calculateSalaryPaydays( $inputYear ){
        // $months = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
        $payDays = [];

        // Calculate sales staff payday
        foreach( MONTHS as $month ){
            $date = new Carbon( $inputYear . '-' . $month . '-1' );
            $lastDay = $date->lastOfMonth(); // returns last day of month

            $isWeekDay = $lastDay->isWeekDay(); // check if date is weekday
            if( $isWeekDay ){
                $payDays[ $month ] = $lastDay->format( 'l jS' );
            } else {
                // If last day of this month is not a week day, fetch last friday
                $payDays[ $month ] = $date->previous( 'Friday' )->format( 'l jS' );;
            }
        }

        return $payDays;
    }

    /**
    * Calculate payment dates for sales staff.
    *
    * @param {string} $inputYear
    * @return \Illuminate\Http\Response
    */
    public function calculateBonusPaydays( $inputYear ){
        // $months = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
        $payDays = [];

        // Calculate sales staff bonus paydays
        foreach( MONTHS as $month ){
            $date = new Carbon( $inputYear . '-' . $month . '-1' );
            $fifteenthOfMonth = $date->firstOfMonth()->addDays( 14 ); // take first of month, add 14 days

            $isWeekDay = $fifteenthOfMonth->isWeekDay(); // check if date is weekday
            if( $isWeekDay ){
                $payDays[ $month ] = $fifteenthOfMonth->format( 'l jS' );;
            } else {
                // If 15th of this month is not a week day, fetch next wednesday
                $payDays[ $month ] = $fifteenthOfMonth->next( 'Wednesday' )->format( 'l jS' );;
            }
        }

        return $payDays;
    }


}
