<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\Event\EventCollection;
use App\Http\Resources\Image\ImageCollection;
use App\Models\Cinema;
use App\Models\Event;
use App\Services\Image\ImageUploaderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function getAllEvents(): EventCollection
    {
        return new EventCollection(Event::latest()->take(15)->get());
    }

    public function getEventsByCinema(Cinema $cinema): EventCollection
    {
        return new EventCollection($cinema->events);
    }

    public function create(CreateEventRequest $request, Cinema $cinema): JsonResponse
    {
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'cinema_id' => $cinema->id,
        ]);
        return response()->json(['id' => $event->id]);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->title = $request->title;
        $event->description = $request->description;
        $event->save();

        return response(null);
    }

    public function delete(Event $event)
    {
        $event->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function uploadImages(Request $request, ImageUploaderService $imageUploaderService): ImageCollection
    {
        $imageFiles = $request->file('images');

        $images = $imageUploaderService->uploadArray($imageFiles);
        return new ImageCollection($images);
    }
}
