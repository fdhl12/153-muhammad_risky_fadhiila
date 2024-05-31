<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class CensorText extends Component
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return view('components.censor-text', [
            'censoredText' => Str::mask($this->text, '*', 0, mb_strlen($this->text))
        ]);
    }
}
