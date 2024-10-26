<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Traits\ValidatePages;


class PageController extends BaseController
{
    public function index()
    {
        try {
            $pages = Page::all();
            return $this->renderResponse($pages, 'Pages retrieved successfully');
        } catch (\Exception $e) {
            return $this->renderResponseWithErrors('Failed to delete page', $e->getMessage(), 500);
        }

    }


    public function store(Request $request)
    {
        $validationResponse = $this->validatePagesRequest($request);
        if ($validationResponse) {
            Log::warning('Validation failed:', ['validationResponse' => $validationResponse]);
            return $validationResponse;
        }

        try {
            $slug = Str::slug($request->input('title'));

            $page = Page::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'content' => $request->input('content'),
                'meta_description' => $request->input('meta_description'),
            ]);

            return $this->renderResponse($page, 'Page created successfully');
        } catch (\Exception $e) {
            return $this->renderResponseWithErrors('Failed to create page', $e->getMessage(), 500);
        }
    }

    public function edit($slug)
    {
        try {
            $page = Page::where('slug', $slug)->first();
            return $this->renderResponse($page, 'Pages retrieved successfully');
        } catch (\Exception $e) {
            return $this->renderResponseWithErrors('Failed to delete page', $e->getMessage(), 500);
        }

    }

    public function update(Request $request, $id)
    {
        
        $validationResponse = $this->validatePagesRequest($request);
        if ($validationResponse) {
            Log::warning('Validation failed:', ['validationResponse' => $validationResponse]);
            return $validationResponse;
        }

        try {

            $page = Page::find($id);
            $slug = Str::slug($validationResponse['title']);

            $page->title = $validationResponse['title'];
            $page->slug = $slug;
            $page->content = $validationResponse['content'];
            $page->meta_description = $validationResponse['meta_description'];

            $page->save();

            return $this->renderResponse($page, 'Page updated successfully');
        } catch (\Exception $e) {
            return $this->renderResponseWithErrors('Failed to update page', $e->getMessage(), 500);
        }
    }


    public function destroy($id)
    {
        try {
            $deletepage = Page::find($id);
            $deletepage->delete();
            return $this->renderResponse(null, 'Page deleted successfully');
        } catch (\Exception $e) {
            return $this->renderResponseWithErrors('Failed to delete page', $e->getMessage(), 500);
        }
    }

    public function show($slug)
    {
        try {
            $page = Page::where('slug', $slug)->first();
            return $this->renderResponse($page, 'Page retrieved successfully');
        } catch (\Exception $e) {
            return $this->renderResponseWithErrors('Page not found', [], 404);
        }
    }
}
