<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Imporing the Model
use App\Models\Photo;

class PhotoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $photos = Photo::all();
    return view('/pages/home', ['photos' => $photos]);
  }

  public function showAll(){
    $photos = Photo::all();
    return view('/pages/photo_list',['photos' => $photos]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages/photo_form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //Creation of Photo object
    $photo = new Photo();

    //Altering object atributes
    $photo->title = $request->title;
    $photo->date = $request->date;
    $photo->description = $request->description;

    //Upload
    if($request->hasFile('photo') && $request->file('photo')->isValid()){

      //Sets a random name for the photo, based on the current date
      $nomeFoto = sha1(uniqid(date('HisYmd')));

      //Retrieve file extension
      $extensao = $request->photo->extension();

      //Vaidation file type

      //Sets filename with the extension
      $nomeArquivo = "$nomeFoto.$extensao";

      //Uploads
      $upload = $request->photo->move(public_path('/storage/photos'),$nomeArquivo);

      //Adding the filename to the photo_url attribute
      $photo->photo_url = $nomeArquivo;

    }

    //If all goes well, save in the database
    if($upload){
      //Inserting on database
      $photo->save();
    }

    //Redirect for the Main Page
    return redirect('/');
  }//End of Store

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $photo = Photo::findOrFail($id);
    return view('pages/photo_form', ['photo' => $photo]);
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
    //Return a photo from database
    $photo = Photo::findOrFail($request->id);

     //Updating atributes of object
    $photo->title = $request->title;
    $photo->date = $request->date;
    $photo->description = $request->description;
    $photo->photo_url = "teste";

    //Updating in database
    $photo->update();

    //Redirect for the Photos Page
    return redirect('/photos');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //Return and delete a photo from database
    Photo::findOrFail($id)->delete();

    //Redirect for the list photos page
   return redirect('/photos');
  }
}
