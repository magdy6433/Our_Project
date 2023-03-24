<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\online_exam;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
class OnlineExamController extends Controller
{
    use MeetingZoomTrait;
    public function index()
    {
        $online_exams = online_exam::all();
        return view('pages.online_exams.index', compact('online_exams'));
    }

    
    public function create()
    {
        
        $online_exams = online_exam::all();
        return view('pages.online_exams.add', compact('online_exams'));
    }
    public function indirectCreate()
    {
        

        $online_exams = online_exam::all();
        return view('pages.online_exams.indirect', compact('online_exams'));
    }
   
    public function store(Request $request)
    {
        try {

            $meeting = $this->createMeeting($request);
            online_exam::create([
                'integration'=> true,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeIndirect(Request $request)
    {
        try {

            
            online_exam::create([
                'integration'=> false,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Request $request)
    {
        try {

            $info = online_exam::find($request->id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
               // online_exam::where('meeting_id', $request->id)->delete();
                online_exam::destroy($request->id);
            }
            else{
               // online_exam::where('meeting_id', $request->id)->delete();
               online_exam::destroy($request->id);
            }

            toastr()->success(trans('messages.Delete'));
            return redirect()->route('online_exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
