<?php
namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    public function create(){
        return view('pages.create');
    }
    public function edit($slug)
    {   
      $response = file_get_contents("http://127.0.0.1:8000/api/pages/edit/{$slug}");

      if ($response === false) {
            abort(404, 'Page not found');
        }

        $page = json_decode($response);

        return view('pages.edit',['page' => $page->data]);
    }

    // Show a specific page

   public function show($slug)
    {
        
        $response = file_get_contents("http://127.0.0.1:8000/api/{$slug}");
  
        if ($response === false) {
            abort(404, 'Page not found');
        }

        $page = json_decode($response);
        
        
        return view('page', ['page' => $page->data]);
    }
}
