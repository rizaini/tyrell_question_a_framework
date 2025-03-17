<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Http\Exception\BadRequestException;

class CardsController extends AppController
{
    public function distribute()
    {
        $numberOfPeople = $this->request->getQuery('people');
    
        // load form if input is null render a form
        if ($numberOfPeople === null) {
            return $this->render('form'); // Render a form template
        }
    
        // validation
        if (!is_numeric($numberOfPeople)) {
            throw new BadRequestException('Input value does not exist or value is invalid');
        }
    
        $numberOfPeople = (int)$numberOfPeople;
        if ($numberOfPeople < 0) {
            throw new BadRequestException('Input value does not exist or value is invalid');
        }
    
        // distribute
        $cards = $this->generateCards();
        $distributedCards = $this->distributeCards($cards, $numberOfPeople);
    
        // pass resutl to view
        $this->set('distributedCards', $distributedCards);
    }

    private function generateCards(): array
    {
        $suits = ['S', 'H', 'D', 'C'];
        $ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'];
        $cards = [];

        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $cards[] = $suit . '-' . $rank;
            }
        }

        shuffle($cards);
        return $cards;
    }

    private function distributeCards(array $cards, int $numberOfPeople): array
    {
        $distributedCards = array_fill(0, $numberOfPeople, []);

        foreach ($cards as $index => $card) {
            $personIndex = $index % $numberOfPeople;
            $distributedCards[$personIndex][] = $card;
        }

        return $distributedCards;
    }
}