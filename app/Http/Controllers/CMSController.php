<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\Process;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function index()
    {
        $process = Process::select('id', 'process_id', 'title')->paginate(20);

        return view('process/cms/process/index', compact('process'));
    }

    public function show(Process $cm)
    {
        $process = $cm;

        return view('process/cms/process/show', compact('process'));
    }

    public function create()
    {
        $cm = null;
        $articleCategories = ArticleCategory::orderBy('name', 'asc')->get();

        return view('process/cms/process/create', compact('cm', 'articleCategories'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'process_id' => ['required', 'unique:cms_process'],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
            'article_category_id' => 'nullable|exists:article_categories,id',
        ]);

        $articleCategoryId = $attributes['article_category_id'];
        unset($attributes['article_category_id']);

        $process = Process::create($attributes);

        if ($articleCategoryId) {
            $process->articleCategories()->attach($articleCategoryId);
        }

        return redirect(route('cms.index'))
            ->with('success', 'Process saved successfully.');
    }

    public function edit(Request $request, Process $cm)
    {
        $articleCategories = ArticleCategory::orderBy('name', 'asc')->get();

        return view('process/cms/process/create', compact('cm', 'articleCategories'));
    }

    public function update(Request $request, Process $cm)
    {
        $attributes = $request->validate([
            'process_id' => ['required', 'unique:cms_process,process_id,'.$cm->id],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
            'article_category_id' => 'nullable|exists:article_categories,id',
        ]);

        $articleCategoryId = $attributes['article_category_id'];
        unset($attributes['article_category_id']);

        $cm->update($attributes);

        if ($articleCategoryId) {
            $cm->articleCategories()->sync($articleCategoryId);
        } else {
            $cm->articleCategories()->detach();
        }

        return redirect(route('cms.index'))
            ->with('success', 'Process saved successfully.');
    }

    public function destroy(Process $cm)
    {
        $cm->delete();

        return redirect(route('cms.index'))
            ->with('success', 'Process deleted successfully.');
    }
}
