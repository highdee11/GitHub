<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerController extends Controller
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
                "server_id" => 1,
                "description" => "server01.domain.nl",
                "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
                "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
            ),
            array(
                "server_id" => 2,
                "description" => "server02.domain.nl",
                "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
                "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
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
                "server_id" => 2,
                "description" => "server02.domain.nl",
                "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
                "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
            ),
        );

        return response()->json($response , 200);
    }

    public  function orderby($keyword){

        $response=array(
            array(
                "server_id" => 2,
                "description" => "server02.domain.nl",
                "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
                "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
            ),
            array(
                "server_id" => 1,
                "description" => "server01.domain.nl",
                "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
                "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
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
            'description'=>"required",
            'ipv4'=>'required',
            'ipv6'=>'required'
        ]);

        $data=$request->input();


        //DATA SAVING IMPLEMENTATION


        $response=array(
                "server_id" => 3,
            "description" => $request->input('description'),
                "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
                "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
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

        $response=array(
            "server_id" => 1,
            "description" => "server01.domain.nl",
            "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
            "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
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
            'description'=>"required",
            'ipv4'=>'required',
            'ipv6'=>'required'
        ]);

        $data=$request->input();

        //QUERY FOR DATA USING $id

        $response=array(
            "server_id" => 1,
            "description" => $request->input('description'),
            "ip_v4" => array("192.168.1.0", "192.168.1.2", "192.168.1.4"),
            "ip_v6" => array("0:0:0:0:0:ffff:c0a8:102"),
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
