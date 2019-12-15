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
            ->paginate($take);
        return $photo;
    }

    public function photoWithTypeServices($type_services_id, $take, $orderby)
    {
        $photo = PhotoLibrary::where('type_of_service_id', $type_services_id)
            ->orderby('id', $orderby)
            ->take($take)
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

    public function loadDiffType($id, $type, $take)
    {
        $photo = PhotoLibrary::where('id', '<', $id)
            ->where('type_of_service_id', $type)
            ->orderby('id', 'desc')
            ->take($take)
            ->get();
        return $photo;
    }

    public function count()
    {
        $photo = PhotoLibrary::count();
        return $photo;
    }

    public function random($limit)
    {
        $photo = PhotoLibrary::all()->random($limit);
        return $photo;
    }

    public function photoSearch($type_id, $pagianate)
    {
        $query = PhotoLibrary::orderby('id', 'desc');
        if ($type_id != null) {
            $query->where('type_of_service_id', $type_id);
        }

        $images = $query->paginate($pagianate);
        return $images;
    }
}
