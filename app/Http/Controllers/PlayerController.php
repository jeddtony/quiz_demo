<?php

namespace App\Http\Controllers;

use App\Charts\PlayerChart;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $chartPlayerScores = Player::all('score', 'name');
        // $chartPlayerNames = Player::all('name');
        // $chartPlayerScores = Player::all()->map(function ($item) {
        // // Return the number of persons with that age
        // // dd($item);
        // return count($item);
        

       $chartPlayerScores =  DB::table('players')
                 ->select('score', DB::raw('count(*) as total'))
                 ->groupBy('score')
                 ->get()->map(function ($item) {
                     // Return the number of persons with that age
                    //  dd($item);
                    //  return count($item);
                     return  $item->total;
                 });

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $playerChart= new PlayerChart;
        $playerChart->title('Distribution of Players Scores', 30, "rgb(255, 99, 132)", true, 'Helvetica Neue');
        // $playerChart->barwidth(0.0);
        // $playerChart->displaylegend(true);
        $playerChart->minimalist(true);
        $playerChart->labels($chartPlayerScores->keys());
        $playerChart->dataset('Players that scored', 'bar', $chartPlayerScores->values())
            ->color($borderColors)
            ->backgroundcolor($fillColors);

    
            $playerCount = Player::all()->count();
            
            $allPlayers = Player::all();
        return view('debug_chart', compact('playerChart', 'playerCount', 'allPlayers'));
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
        //
        // dd($request->input('username'));
       $player =  Player::create([
            'name' => $request->input('username')
        ]);

        return redirect()->to('https://aricentvas.com/game?userId='.$player->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
        // dd($request->input('userId'));

        $playerId = $request->input('userId');
        $playerScore = $request->input('score');
        $player = Player::find($playerId);

        $player->score = $playerScore;
        $player->save();

        $topPlayers = Player::limit(10)->get();
        return view('display-scores', compact('player', 'topPlayers'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
