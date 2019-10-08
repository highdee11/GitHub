<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $response= array(
            array(
                "id"=>1,
                "companyname" => "Lefficient",
                "firstname" => "Bas",
                "lastname" => "Zwaag",
                "address" => "Willem Pijperstraat 62",
                "zipcode" => "1323TL",
                "city" => "Almere",
                "country" => "NL",
                "phone" => "+31642283270",
                "email" => "info@lefficient.nl",
            ),
            array(
                "id"=>2,
                "companyname" => "Company",
                "firstname" => "Voornaam",
                "lastname" => "Achternaam",
                "address" => "Adres",
                "zipcode" => "1111AA",
                "city" => "Stad",
                "country" => "NL",
                "phone" => "+31612345678",
                "email" => "info@email.nl",
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



    public function search($keyword){
        $response=array(
            array(
                "id"=>1,
                "companyname" => "Lefficient",
                "firstname" => "Bas",
                "lastname" => "Zwaag",
                "address" => "Willem Pijperstraat 62",
                "zipcode" => "1323TL",
                "city" => "Almere",
                "country" => "NL",
                "phone" => "+31642283270",
                "email" => "info@lefficient.nl",
            ),
            array(
                "id"=>2,
                "companyname" => "Company",
                "firstname" => "Voornaam",
                "lastname" => "Achternaam",
                "address" => "Adres",
                "zipcode" => "1111AA",
                "city" => "Stad",
                "country" => "NL",
                "phone" => "+31612345678",
                "email" => "info@email.nl",
            ),
        );

        return response()->json($response , 200);
    }

    public function orderby($keyword){
        $response=array(
            array(
                "id"=>1,
                "companyname" => "Lefficient",
                "firstname" => "Bas",
                "lastname" => "Zwaag",
                "address" => "Willem Pijperstraat 62",
                "zipcode" => "1323TL",
                "city" => "Almere",
                "country" => "NL",
                "phone" => "+31642283270",
                "email" => "info@lefficient.nl",
            ),
            array(
                "id"=>2,
                "companyname" => "Company",
                "firstname" => "Voornaam",
                "lastname" => "Achternaam",
                "address" => "Adres",
                "zipcode" => "1111AA",
                "city" => "Stad",
                "country" => "NL",
                "phone" => "+31612345678",
                "email" => "info@email.nl",
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
            "companyname" => "required",
        ]);

        $data=$request->input();


        //DATA SAVING IMPLEMENTATION


        $response= array(
            "id"=>1,
            "companyname" => $request->input('companyname'),
            "firstname" => "Voornaam",
            "lastname" => "Achternaam",
            "address" => "Adres",
            "zipcode" => "1111AA",
            "city" => "Stad",
            "country" => "NL",
            "phone" => "+31612345678",
            "email" => "info@email.nl",
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
        $this->validate($request , [
            "companyname" => "required",
        ]);

        $data=$request->input();


        //DATA SAVING IMPLEMENTATION


        $response= array(
            "id"=>1,
            "companyname" => "Company",
            "firstname" => "Voornaam",
            "lastname" => "Achternaam",
            "address" => "Adres",
            "zipcode" => "1111AA",
            "city" => "Stad",
            "country" => "NL",
            "phone" => "+31612345678",
            "email" => "info@email.nl",
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
