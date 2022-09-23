<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Choice;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PollController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poll = Poll::with('choices')->get();

        return response()->json(['data' => $poll], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role != 'admin') return response()->json(['message' => 'Unathorized'], 401);

        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'deadline' => ['required'],
            'choices' => ['required', 'min:2', 'array'],
        ]);

        if ($validator->fails()) return response()->json(['message' => 'Invalid fields'], 422);

        $poll = Poll::create([
            'title' => request('title'),
            'created_by' => auth()->user()->id,
            'description' => request('description'),
            'deadline' => request('deadline'),
        ]);

        foreach (request('choices') as $choice) {
            Choice::create([
                'poll_id' => $poll->id, 
                'choice' => $choice,
            ]);
        }

        return response()->json(['message' => $poll], 200);        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::find($id);

        $result = Vote::where('poll_id', $poll->id);
        $option_list = Choice::where('poll_id', $poll->id)->get();

        $total_data = $result->count();

        $percentage = [];
        foreach ($option_list as $opt) {
            $count = $result->get()->where('choice_id', $opt->id)->count();

            array_push($percentage, [
                'id' => $opt->id,
                'choice' => $opt->choice,
                'point' => $total_data == 0 ? 0 : ($count / $total_data) * 100
            ]);
        }

        return response([
            'id' => $poll->id, 
            'title' => $poll->title, 
            'description' => $poll->description, 
            'deadline' => $poll->deadline,
            'created_by' => $poll->created_by, 
            'created_at' => $poll->created_at,
            'creator' => $poll->creator,
            'result' => $percentage, 
            'choices' => $option_list, 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role != 'admin') return response()->json(['message' => 'Unathorized'], 401);

        $poll = Poll::deleteData($id);

        return response()->json(['message' => 'Delete Successfully'], 200);
    }

    public function vote($pollId, $choiceId) {
        // if (auth()->user()->role != 'user') return response()->json(['message' => 'Unathorized'], 401);

        $poll = Poll::find($pollId);
        $choice = Choice::find($choiceId);

        if (! $poll || ! $choice) return response()->json(['message' => 'Invalid Choice'], 422);
        
        if (Carbon::now() >= $poll->deadline) return response()->json(['message' => 'Voting Deadline'], 422);

        if (auth()->user()->votes->contains($poll->id)) return response()->json(['message' => 'Already Voted'], 422);

        Vote::create([
            'poll_id' => $poll->id,
            'choice_id' => $choice->id,
            'user_id' => auth()->user()->id,
            'division_id' => auth()->user()->division_id,
        ]);

        return response()->json(['message' => 'Voting Success'], 200);
    }
}
