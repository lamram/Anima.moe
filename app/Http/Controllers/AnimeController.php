<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Episode;

class AnimeController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	
	public function getAnimeList() {
		$anime_list = Anime::orderBy('name')->get();
		return view('list')->with('list', $anime_list);
	}
	
	public function getEpisodeList($anime_id) {
		$anime = Anime::where('id', '=', $anime_id)->first();
		$episode_list = Episode::where('episodes.anime_id', '=', $anime_id)->orderBy('episodes.number')->get();
		return view('anime')->with(['episodeList' => $episode_list, 'anime' => $anime]);
	}
    
	public function getEpisode($anime_id, $episode) {
		$anime = Anime::where('id', '=', $anime_id)->first();
		$episodes = Episode::where('anime_id', '=', $anime_id)->get();
		$video = $episodes->where('number', '=', $episode)->first();
		return view('watch')->with(['anime' => $anime->name, 'video' => $video, 'startingEpisode' => $episodes->min('number'), 'endingEpisode' => $episodes->max('number')]);
    }
}