<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Classification;
use App\Models\Domain;
use Illuminate\Http\Request;

class MainDomainController extends Controller
{

    public function index()
    {
        $domains = Domain::select('id', 'main_domain_id', 'main_domain_name', 'main_domain_description')->paginate(20);

        return view('process.initial-setup.domains.index', compact('domains'));
    }

    public function show(Domain $domain)
    {
        $domain->load('bestPractices');

        return view('process.initial-setup.domains.show', compact('domain'));
    }

    public function create()
    {
        $domain = null;
        $classifications = Classification::select('classification_id', 'classification_name')->get();
        $bestPractices = BestPractice::select('best_practice_id', 'best_practice_name')->get();
        $bestPracticeIds = [];
        return view('process.initial-setup.domains.create', compact('domain', 'classifications', 'bestPractices', 'bestPracticeIds'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'main_domain_id' => ['required', 'unique:domain_table'],
            'main_domain_name' => 'required',
            'main_domain_description' => 'nullable',
            'classification_id' => 'nullable',
            'bestPractices' => 'required',
        ]);

        $bestPractices = $attributes['bestPractices'] ?? null;
        unset($attributes['bestPractices']);

        $domain = Domain::create($attributes);

        $domain->bestPractices()->attach($bestPractices ?? []);

        return redirect(route('domains.index'))
            ->with('success', 'Domain saved successfully.');
    }

    public function edit(Domain $domain)
    {
        $domain->load('bestPractices');


        $classifications = Classification::select('classification_id', 'classification_name')->get();
        $bestPractices = BestPractice::select('best_practice_id', 'best_practice_name')->get();
        $bestPracticeIds =  $domain->bestPractices->pluck('best_practice_id')->toArray();

        return view('process.initial-setup.domains.create', compact('domain', 'classifications', 'bestPractices', 'bestPracticeIds'));
    }

    public function update(Domain $domain, Request $request)
    {
        $attributes = $request->validate([
            'main_domain_id' => ['required', 'unique:domain_table,main_domain_id,' . $domain->id],
            'main_domain_name' => 'required',
            'main_domain_description' => 'nullable',
            'classification_id' => 'nullable',
            'bestPractices' => 'nullable',
        ]);

        $bestPractices = $attributes['bestPractices'] ?? null;
        unset($attributes['bestPractices']);

        $domain->update($attributes);

        $domain->bestPractices()->sync($bestPractices ?? []);

        return redirect(route('domains.index'))
            ->with('success', 'Domain saved successfully.');
    }

    public function destroy(Domain $domain)
    {
        if ($domain->subDomains()->exists()) {
            return redirect(route('domains.index'))
                ->with('error', "Domain {$domain->main_domain_name} cannot be deleted due to existing dependencies.");
        }

        $domain->bestPractices()->detach();
        $domain->delete();

        return redirect(route('domains.index'))
            ->with('success', 'Domain deleted successfully.');
    }
}
