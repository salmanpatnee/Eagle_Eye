<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Domain;
use App\Models\SubDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDomainController extends Controller
{

    public function index()
    {
        $subDomains = SubDomain::select('id',  'sub_domain_id', 'sub_domain_name', 'main_domain_id')->with('domain')
            ->get();

        return view('4-Process.1-InitialSetup.sub-domains.index', compact('subDomains'));
    }


    public function show(SubDomain $subDomain)
    {
        $subDomain->load('classification', 'bestPractices', 'categories', 'domain');

        return view('4-Process.1-InitialSetup.sub-domains.show', compact('subDomain'));
    }

    public function create()
    {
        $subDomain = null;
        $domains = Domain::select('main_domain_id', 'main_domain_name')->get();
        $classifications = Classification::select('classification_id', 'classification_name')->get();
        $bestPractices = BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $categories = Category::select('category_id', 'category_name')->get();
        $categoryIds = [];
        $bestPracticeIds = [];

        return view('4-Process.1-InitialSetup.sub-domains.create', compact('subDomain', 'classifications', 'categories', 'domains', 'bestPractices', 'bestPracticeIds', 'categoryIds'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'sub_domain_id' => ['required', 'unique:sub_domain_table'],
            'sub_domain_name' => 'required',
            'sub_domain_description' => 'nullable',
            'classification_id' => 'nullable',
            'main_domain_id' => 'required',
            'categories' => 'required',
            'bestPractices' => 'required'
        ]);

        $bestPractices = $attributes['bestPractices'] ?? null;
        unset($attributes['bestPractices']);

        $categories = $attributes['categories'] ?? null;
        unset($attributes['categories']);

        $subDomain = SubDomain::create($attributes);

        $subDomain->bestPractices()->attach($bestPractices ?? []);

        $subDomain->categories()->attach($categories ?? []);


        return redirect()->route('sub-domains.index')
            ->with('success', 'Sub-Domain saved successfully.');
    }

    public function edit(SubDomain $subDomain)
    {
        $classifications = Classification::select('classification_id', 'classification_name')->get();
        $domains = Domain::select('main_domain_id', 'main_domain_name')->get();
        $bestPractices = BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $categories = Category::select('category_id', 'category_name')->get();

        $bestPracticeIds =  $subDomain->bestPractices->pluck('best_practices_id')->toArray();
        $categoryIds =  $subDomain->categories()->pluck('category_table.category_id')->toArray();

        return view('4-Process.1-InitialSetup.sub-domains.create', compact('subDomain', 'classifications', 'domains', 'bestPractices', 'categories', 'bestPracticeIds', 'categoryIds'));
    }

    public function update(SubDomain $subDomain, Request $request)
    {
        $attributes = $request->validate([
            'sub_domain_id' => ['required', 'unique:sub_domain_table,sub_domain_id,' . $subDomain->id],
            'sub_domain_name' => 'required',
            'sub_domain_description' => 'nullable',
            'classification_id' => 'nullable',
            'main_domain_id' => 'required',
            'categories' => 'required',
            'bestPractices' => 'required'
        ]);

        $bestPractices = $attributes['bestPractices'] ?? null;
        unset($attributes['bestPractices']);

        $categories = $attributes['categories'] ?? null;
        unset($attributes['categories']);

        $subDomain->update($attributes);

        $subDomain->bestPractices()->sync($bestPractices ?? []);

        $subDomain->categories()->sync($categories ?? []);


        return redirect(route('sub-domains.index'))
            ->with('success', 'Sub-Domain saved successfully.');
    }


    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        SubDomain::where('id', $attributes['record'])->delete();

        return redirect(route('sub-domains.index'))
            ->with('success', 'Sub-Domain(s) deleted successfully.');

        // $ids =  $request->validate([
        //     'records' => ['required', 'array'],
        // ]);

        // try {
        //     SubDomain::whereIn('id', $ids['records'])->each(function ($subDomain) {

        //         $subDomain->bestPractices()->detach();
        //         $subDomain->categories()->detach();
        //         $subDomain->delete();
        //     });

        //     return redirect(route('sub-domains.index'))
        //         ->with('success', 'Sub-Domain(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect(route('sub-domains.index'))
        //         ->with('error', $e->getMessage());
        // }
    }
}
