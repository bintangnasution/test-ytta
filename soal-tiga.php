<?php

// Cek apakah huruf adalah vokal
function isVowel($char) {
    return in_array(strtolower($char), ['a', 'i', 'u', 'e', 'o']);
}

// Cek apakah karakter adalah huruf alfabet
function isAlphabet($char) {
    return preg_match('/[a-zA-Z]/', $char);
}

// Kelas untuk implementasi stack
class Stack {
    private $elements = "";

    // Tambah elemen ke stack
    public function push($char) {
        $this->elements .= $char;
    }

    // Ambil elemen terakhir dari stack
    public function pop() {
        if (strlen($this->elements) > 0) {
            $lastElement = $this->elements[strlen($this->elements) - 1];
            $this->elements = substr($this->elements, 0, -1);
            return $lastElement;
        }
        return "";
    }

    // Ambil elemen terakhir tanpa menghapusnya
    public function top() {
        return strlen($this->elements) > 0 ? $this->elements[strlen($this->elements) - 1] : "";
    }

    // Tampilkan semua elemen di stack
    public function show() {
        echo $this->elements;
    }

    // Hapus semua elemen dari stack
    public function clear() {
        $allElements = $this->elements;
        $this->elements = "";
        return $allElements;
    }
}

// Kamus konversi huruf
function translate($text) {
    $dictionary = [
        "h" => "p", "n" => "dh", "c" => "j", "r" => "y",
        "k" => "ny", "d" => "m", "t" => "g", "s" => "b",
        "w" => "th", "l" => "ng", "p" => "h", "dh" => "n",
        "j" => "c", "y" => "r", "ny" => "k", "m" => "d",
        "g" => "t", "b" => "s", "th" => "w", "ng" => "l"
    ];

    return isset($dictionary[strtolower($text)]) ? $dictionary[strtolower($text)] : $text;
}

// Ambil input dari parameter 'text'
$inputString = isset($_GET["text"]) ? $_GET["text"] : "";
$stack = new Stack();
$output = "";

// Proses setiap karakter dari input
foreach (str_split($inputString) as $char) {
    if (isAlphabet($char)) {
        if (isVowel($char)) {
            $output .= translate($stack->clear()) . $char;
        } else if ($char == "h") {
            $stack->push($char);
            $output .= translate($stack->clear());
        } else {
            $stack->push($char);
        }
    } else {
        $output .= translate($stack->clear()) . $char;
    }
}

// Tambahkan sisa stack ke output
$output .= translate($stack->clear());

// Tampilkan hasil akhir
echo $output;

