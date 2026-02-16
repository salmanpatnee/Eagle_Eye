<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\Resource;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ArticleCategory::orderBy('name', 'asc')->paginate(20);

        return view('process.articles.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articleCategory = null;

        return view('process.articles.categories.create', compact('articleCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name',
            'description' => 'nullable|string',
            'article_list' => 'nullable|string',
        ]);
        ArticleCategory::create($attributes);

        return redirect(route('article-categories.index'))->with('success', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        return view('process.articles.categories.show', compact('articleCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('process.articles.categories.create', compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name,'.$articleCategory->id,
            'description' => 'nullable|string',
            'article_list' => 'nullable|string',
        ]);
        $articleCategory->update($attributes);

        return redirect(route('article-categories.index'))->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->load('resources');
        if ($articleCategory->resources()->count() > 0) {
            return redirect(route('article-categories.index'))
                ->with('error', 'Category cannot be deleted as it has resources attached to it.');
        } else {
            $articleCategory->delete();
        }

        return redirect(route('article-categories.index'))->with('success', 'Category deleted successfully.');
    }

    /**
     * Show the form for creating a new resource for article category.
     *
     * @return \Illuminate\Http\Response
     */
    public function createResource(ArticleCategory $articleCategory)
    {
        return view('process.articles.categories.create-resource', compact('articleCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeResource(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'videoUploadEle' => 'nullable|file|max:20480',
                'checklistUploadEle' => 'nullable|file|max:20480',
                'templateUploadEle' => 'nullable|file|max:20480',
                'glossaryUploadEle' => 'nullable|file|max:20480',
                'resource_type' => 'required|in:guide,template,checklist,glossary',
                'article_category_id' => 'required|exists:article_categories,id',
                'resourceable_type' => 'required|string',
            ]);

            $resources = collect([
                'videoUploadEle' => 'guide',
                'checklistUploadEle' => 'checklist',
                'templateUploadEle' => 'template',
                'glossaryUploadEle' => 'glossary',
            ])->mapWithKeys(function ($resourceType, $inputName) use ($request) {
                if ($request->hasFile($inputName)) {
                    $file = $request->file($inputName);
                    $path = $file->store('resources', 'public');

                    return [$resourceType => Resource::create([
                        'file_name' => $file->getClientOriginalName(),
                        'file_path' => $path,
                        'file_type' => $file->getClientMimeType(),
                        'resource_type' => $resourceType,
                        'resourceable_id' => $request->article_category_id,
                        'resourceable_type' => 'App\Models\ArticleCategory',
                    ])];
                }

                return [];
            });

            return response()->json([
                'success' => true,
                'message' => 'Resources uploaded successfully.',
                'resources' => $resources,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error uploading resources: '.$e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyResource(Resource $resource)
    {

        $resource->delete();

        return redirect()->back()->with('success', 'Resource deleted successfully.');
    }
}
