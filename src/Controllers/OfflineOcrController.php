<?php

namespace Hossam\LaravelOcr\Controllers;

use App\Http\Controllers\Controller;
use Hossam\LaravelOcr\Requests\OcrImageRequest;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Hossam\LaravelOcr\Traits\ManageFiles;
use thiagoalessio\TesseractOCR\UnsuccessfulCommandException;


class OfflineOcrController extends Controller
{
    use ManageFiles;
    public function image(OcrImageRequest $request)
    {
        try {
            $imagePath = $this->uploadFile($request->image, 'images');
            $tesseract = new TesseractOCR($imagePath);

            // Set the languages from the request (assuming it's an array)
            $languages = $request->lang ?? ['eng'];

            // Convert the array of languages to a string with comma-separated values
            $langParam = implode('+', $languages);

            $tesseract->lang($langParam);

            if ($request->user_words) {
                $path = $this->uploadFile($request->user_words, 'user_words');
                $tesseract->userWords($path);
                $this->deleteFile($path);
            }

            $text = $tesseract->run();
            $this->deleteFile($imagePath);

            // Split the OCR text into lines
            $lines = explode("\n", $text);

            // Create an associative array with line numbers as keys and content as values
            $formattedText = [];
            foreach ($lines as $lineNumber => $lineContent) {
                $formattedText[$lineNumber + 1] = $lineContent;
            }

            return response()->json([
                'text' => $formattedText,
            ]);
        } catch (UnsuccessfulCommandException $e) {
            // Handle the exception, log it, or return an error response
            return response()->json([
                'error' => 'OCR processing failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function languages()
    {
        $languages = [];
        foreach ((new TesseractOCR())->availableLanguages() as $lang) {
            $languages[] = $lang;
        }
        return response()->json([
            'supported_languages' => $languages,
        ]);
    }
}
