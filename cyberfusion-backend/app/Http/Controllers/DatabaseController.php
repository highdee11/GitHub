<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $response=array(
            array(
                "id"=>1,
                "server" 			=> "localhost",
                "database_name" 	=> "database_name",
                "database_username" => "database_username",
            ),

            array(
                "id"=>2,
                "server" 			=> "leffix.nl",
                "database_name" 	=> "admin_tst",
                "database_username" => "admin_tst",
            ),

            array(
                "id"=>3,
                "server" 			=> "localhost",
                "database_name" 	=> "database_name",
                "database_username" => "database_username",
            ),

        );

        return response()->json([
            "current_page"=> 1,
            'from'=>1,
            'to'=>1,
            'data'=>$response,
            'first_page_url'=>"",
            'last_page_url'=>"",
            'next_page_url'=>"",
            'total'=>1,
            'per_page'=>5

        ] , 200);

    }

    public  function search($keyword){

        $response=array(
            array(
                "id"=>1,
                "server" 			=> "localhost",
                "database_name" 	=> "database_name",
                "database_username" => "database_username",
            ),

            array(
                "id"=>2,
                "server" 			=> "leffix.nl",
                "database_name" 	=> "admin_tst",
                "database_username" => "admin_tst",
            ),

        );

        return response()->json($response , 200);
    }

    public  function orderby($keyword){

        $response=array(
            array(
                "id"=>1,
                "server" 			=> "localhost",
                "database_name" 	=> "database_name",
                "database_username" => "database_username",
            ),

            array(
                "id"=>2,
                "server" 			=> "leffix.nl",
                "database_name" 	=> "admin_tst",
                "database_username" => "admin_tst",
            ),

            array(
                "id"=>3,
                "server" 			=> "localhost",
                "database_name" 	=> "database_name",
                "database_username" => "database_username",
            ),

        );

        return response()->json($response , 200);
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
//            'server'=>"required",
            'database_name'=>'required',
            'database_username'=>'required',
            'database_password'=>'required',
            'database_password_confirm'=>'required'
        ]);

        $data=$request->input();


        //DATA SAVING IMPLEMENTATION


        $response= array(
            "id"=>1,
            "server" 			=> "localhost",
            "database_name" 	=>  $request->input('database_name'),
            "database_username" => $request->input('database_username'),
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
            "id"=>1,
            "server" 			=> "localhost",
            "database_name" 	=> "database_name",
            "database_username" => "database_username",
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
            'server'=>"required",
            'database_name'=>'required',
            'database_username'=>'required'
        ]);

        $data=$request->input();

        //QUERY FOR DATA USING $id

        $response= array(
            "id"=>1,
            "server" 			=> "localhost",
            "database_name" 	=>  $request->input('database_name'),
            "database_username" => $request->input('database_username'),
        );

        return response()->json( $response , 200);
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
