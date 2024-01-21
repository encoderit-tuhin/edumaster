<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Image;

trait TextImageTrait
{
    public function createImageWithText($text, $width, $height, $align = 'left', $fontSize =12 )
    {
        // Set the font file path
        $fontPath = public_path('fonts/Kalpurush.ttf');

        // Create a new image instance with a white background
        $image = Image::canvas($width, $height, '#ffffff');

        // Add text to the image
        $image->text($text, $width / 2, $height / 2, function($font) use ($fontPath, $fontSize) {
            $font->file($fontPath);
            $font->size($fontSize); // Set the font size
            $font->color('#000000'); // Set the text color
            // $font->color([255, 255, 255, 0.5]);
            $font->align('center'); // Set the text alignment
            $font->valign('center'); // Set the vertical alignment
        });

        return $image->encode('data-url', 100)->encoded;
    }
}