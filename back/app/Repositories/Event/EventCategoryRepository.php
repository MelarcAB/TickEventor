<?php

namespace App\Repositories\Event;

use App\Models\Events\EventCategory;

use App\Helpers\SlugService;

use App\Repositories\Event\Contracts\EventCategoryRepositoryInterface;

use Auth;

class EventCategoryRepository implements EventCategoryRepositoryInterface{

    public function all(){
        return EventCategory::all();
    }

    public function create($data,$userId){
        $data['slug'] = SlugService::createSlug(EventCategory::class, $data['name']);
        $data['created_by'] = $userId;
        return EventCategory::create($data);
    }

    public function update($id, $data, $userId){
        $data['slug'] = SlugService::createSlug(EventCategory::class,  $data['name']);
        $data['updated_by'] = $userId;
        return EventCategory::where('id', $id)->update($data);
    }

    public function delete($id){
        return EventCategory::where('id', $id)->delete();
    }

    public function find($id){
        return EventCategory::where('id', $id)->first();
    }
    //findByName
    public function findByName($name){
        return EventCategory::where('name', $name)->first();
    }

    public function findBySlug($slug){
        return EventCategory::where('slug', $slug)->first();
    }

    public function findBySlugOrFail($slug){
        return EventCategory::where('slug', $slug)->firstOrFail();
    }




}