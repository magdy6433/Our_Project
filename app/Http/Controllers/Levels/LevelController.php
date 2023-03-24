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
  // public function store(StoreLevels $request)
  public function store(Request $request)
  {
    
    // $validated = $request->validated();
    // $Level = new Level();
    // $Level->Name = $request->Name;
    // $Level->Images = $request->Images;
    // // $Level->save();

    // if ($Images = $request->file('Images')) {
    //           Storage::disk('public')->delete($article->Images);
    //           $name = $image->hashName();
    
    //           $validated['Images'] = $image->storeAs('Level', $name, 'public');
    //       }
    
    //       Level::create($validated);
    
    //       return redirect()->route('Levels')->with('success', ' been Saved.');

    $validatedData = $request->validate([
      'Name'=> 'required',
      'Images' => 'required|image',
      // Other validation rules for form fields
      
  ]);
  if ($image = $request->file('Images')) {
    $name = $image->hashName();
    $validatedData['Images'] = $image->storeAs('levels', $name, 'public');
    // $imagePath = $image->storeAs('levels',$name,'public');
    
  }
  Level::create($validatedData);
// $level = new Level();
// $level->Name = $request->Name;
// $level->Images = str_replace('public/', '', $imagePath);
// $level->save();
return redirect()->route('Levels.index');
  }


  // public function store(Request $request)
  // {
  //     $validated = $request->validated([
  //         'id' => 'required',
  //         'Name' => 'required|max:191|min:10',
  //         'Images' => 'required|image|mimes:png,jpg',
  //     ]);

  //     if ($image = $request->file('image')) {

  //         $name = $image->hashName();

  //         $validated['image'] = $image->storeAs('articles', $name, 'public');
  //     }

  //     Article::create($validated);

  //     return redirect()->route('Levels.Levels')->with('success', 'Article has been Saved.');
  // }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return view('pages.Levels.Levels',compact('Levels'));
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