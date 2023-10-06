<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealerRequest;
use App\Models\CardFace;
use App\Models\CardNumber;
use Illuminate\Support\Arr;

class DealerController extends Controller
{
    public function index(DealerRequest $request)
    {
        $face          = CardFace::pluck('name');
        $number        = CardNumber::pluck('value');
        $join_cards    = Arr::crossJoin($face, $number);
        $deck_of_cards = array_map(function ($card) {
            $new_number = $card[1];
            $new_face   = CardFace::where('name', $card[0])->value('value');

            if (($new_number === 1) || ($new_number === 10) || ($new_number === 11) || ($new_number === 12) || ($new_number === 13)) {
                $new_number = CardNumber::where('value', $new_number)->value('name');
            }

            return $new_number . ' of ' . $new_face;
        }, $join_cards);

        // Shuffle our deck of cards.
        $shuffled_cards = Arr::shuffle($deck_of_cards);

        $deal = $this->dealPlayer($request->player, $shuffled_cards);

        return response()->json([
            'status'       => 'success',
            'players'      => $request->player,
            'card balance' => $deal['balance'],
            'deal'         => $deal['new_deck'],
        ]);
    }

    public function dealPlayer($players, $cards)
    {
        $count_card   = count($cards);
        $divide_card  = floor($count_card / $players);
        $balance_card = $count_card - ($divide_card * $players);
        $new_deck     = [];

        for ($x = 0; $x < $players; $x++) {
            $collection                   = collect($cards);
            $new_deck['player_' . $x + 1] = $collection->take($divide_card);
        }

        return [
            'new_deck' => $new_deck,
            'balance'  => $balance_card
        ];
    }
}
