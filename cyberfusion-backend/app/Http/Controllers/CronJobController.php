<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $response='[{
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 1,
                    "minute"			: "*",
                    "hour"				: "*",
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: 1,
                    "command"			: "/usr/bin/wget -O /dev/null http://www.domain.com/cron.php",
                    "email_addresses"	: "info@lefficient.nl,bas@baszwaag.nl"
                },
                {
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 4,
                    "minute"			: 1,
                    "hour"				: "*",
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: "*",
                    "command"			: "/usr/local/bin/curl --silent http://www.domain.com/cron.php > /dev/null",
                    "email_addresses"	: "info2@lefficient.nl,bas@baszwaag.nl"
                },
                {
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 2,
                    "minute"			: "*",
                    "hour"				: 6,
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: "*",
                    "command"			: "/usr/local/bin/php /home/admin/domains/domain.com/public_html/script.php",
                    "email_addresses"	: "info3@lefficient.nl,bas@baszwaag.nl"
                }]';

        return response()->json([
            "current_page"=> 1,
            'from'=>1,
            'to'=>1,
            'data'=>json_decode($response),
            'first_page_url'=>"",
            'last_page_url'=>"",
            'next_page_url'=>"",
            'total'=>1,
            'per_page'=>5

        ] , 200);

    }



    public function search($keyword){
        $response='[{
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 1,
                    "minute"			: "*",
                    "hour"				: "*",
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: 1,
                    "command"			: "/usr/bin/wget -O /dev/null http://www.domain.com/cron.php",
                    "email_addresses"	: "info@lefficient.nl,bas@baszwaag.nl"
                }, 
                {
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 2,
                    "minute"			: "*",
                    "hour"				: 6,
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: "*",
                    "command"			: "/usr/local/bin/php /home/admin/domains/domain.com/public_html/script.php",
                    "email_addresses"	: "info3@lefficient.nl,bas@baszwaag.nl"
                }]';

        return response()->json(json_decode($response) , 200);
    }

    public function orderby($keyword){
        $response='[{
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 1,
                    "minute"			: "*",
                    "hour"				: "*",
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: 1,
                    "command"			: "/usr/bin/wget -O /dev/null http://www.domain.com/cron.php",
                    "email_addresses"	: "info@lefficient.nl,bas@baszwaag.nl"
                },
                {
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 4,
                    "minute"			: 1,
                    "hour"				: "*",
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: "*",
                    "command"			: "/usr/local/bin/curl --silent http://www.domain.com/cron.php > /dev/null",
                    "email_addresses"	: "info2@lefficient.nl,bas@baszwaag.nl"
                },
                {
                    "reseller_id" 		: 1,
                    "cronjob_id" 		: 2,
                    "minute"			: "*",
                    "hour"				: 6,
                    "day_month"			: "*",
                    "month"				: "*",
                    "day_week"			: "*",
                    "command"			: "/usr/local/bin/php /home/admin/domains/domain.com/public_html/script.php",
                    "email_addresses"	: "info3@lefficient.nl,bas@baszwaag.nl"
                }]';

        return response()->json(json_decode($response) , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request , [
            "minute"=>"required",
            "hour"=>"required",
            "day_month"=>"required",
            "month"=>"required",
            "day_week"=>"required",
            "command"=>"required",
            "email_addresses"=>"required",

        ]);

        $data=$request->input();


        //DATA SAVING IMPLEMENTATION


        $response= array(
            "reseller_id"=>'1',
            "cronjob_id"=>'1',
            "minute"=>$request->input('minute'),
            "hour"=>$request->input('hour'),
            "day_month"=>$request->input('day_month'),
            "month"=>$request->input('month'),
            "day_week"=>$request->input('day_week'),
            "command"=>$request->input('command'),
            "email_addresses"=>$request->input('email_addresses'),
        );

        return response()->json($response , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //QUERY FOR DATA HERE USING $id

        $response= array(
            "id" => 1,
            "description" => "Tag 1"
        );

        return response()->json( $response , 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request , [
            "minute"=>"required",
            "hour"=>"required",
            "day_month"=>"required",
            "month"=>"required",
            "day_week"=>"required",
            "command"=>"required",
            "email_addresses"=>"required",

        ]);

        $data=$request->input();


        //DATA SAVING IMPLEMENTATION


        $response= array(
            "reseller_id"=>'1',
            "cronjob_id"=>'1',
            "minute"=>$request->input('minute'),
            "hour"=>$request->input('hour'),
            "day_month"=>$request->input('day_month'),
            "month"=>$request->input('month'),
            "day_week"=>$request->input('day_week'),
            "command"=>$request->input('command'),
            "email_addresses"=>$request->input('email_addresses'),
        );

        return response()->json($response , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //QUERY FOR DATA USING $id

        return response()->json( ['message'=>'Data deleted'] , 200);
    }
}
