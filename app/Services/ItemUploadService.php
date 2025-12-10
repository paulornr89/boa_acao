<?php

namespace App\Services;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Models\Item;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ItemUploadService
{
    private static $path = 'itens/';

    public static function handleUploadFile(UploadedFile $itemImage): string | null
    {
        $hashedFileName = $itemImage->hashName();
        if (!$itemImage->store(self::$path, 'public'))
            throw new Exception("Erro ao salvar imagem do item!!");
        if(!Storage::disk('public')->exists(self::$path.$hashedFileName))
            return null;
        return $hashedFileName;
    }
  }