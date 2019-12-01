<?php

namespace App\Services;

use App\PhotoLibrary;

class PhotoLibraryServices
{
    public function all($orderby)
    {
        $photo = PhotoLibrary::orderby('id', $orderby)->get();
        return $photo;
    }

    public function take($orderby, $take)
    {
        $photo = PhotoLibrary::orderby('id', $orderby)
            ->take($take)
            ->get();
        return $photo;
    }

    public function photoWitdTypeServices($type_services_id, $orderby)
    {
        $photo = PhotoLibrary::where('type_of_service_id', $type_services_id)
            ->orderby('id', $orderby)
            ->get();
        return $photo;
    }

    public function deleteMany($array_id)
    {
        PhotoLibrary::whereIn('id', $array_id)->delete();
    }

    public function loadDiff($id, $take)
    {
        $photo = PhotoLibrary::where('id', '<', $id)
            ->take($take)
            ->orderby('id', 'desc')
            ->get();
        return $photo;
    }

    public function count()
    {
        $photo = PhotoLibrary::count();
        return $photo;
    }
}
