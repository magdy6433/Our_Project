<?php 
namespace App\Http\Controllers\Levels;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLevels;

use App\Models\Level;
use Illuminate\Http\Request;
class LevelController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Levels = Level::all();
    return view('pages.Levels.Levels',compact('Levels'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreLevels $request)
  {
    
    $validated = $request->validated();
    $Level = new Level();
    $Level->Name = $request->Name;
    $Level->Notes = $request->Notes;
    $Level->save();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>