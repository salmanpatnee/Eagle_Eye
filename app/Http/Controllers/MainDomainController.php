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
        $domains = Domain::select('id', 'main_domain_id', 'main_domain_name', 'main_domain_description')->get();

        return view('4-Process.1-InitialSetup.domains.index', compact('domains'));
    }

    public function show(Domain $domain)
    {
        $domain->load('bestPractices');

        return view('4-Process.1-InitialSetup.domains.show', compact('domain'));
    }

    public function create()
    {
        $domain = null;
        $classifications = Classification::select('classification_id', 'classification_name')->get();
        $bestPractices = BestPractice::select('best_practices_id', 'best_practices_name')->get();

        return view('4-Process.1-InitialSetup.domains.create', compact('domain', 'classifications', 'bestPractices'));
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

        if (count($bestPractices)) {
            $domain->bestPractices()->attach($bestPractices);
        }

        return redirect(route('domains.index'))
            ->with('success', 'Domain saved successfully.');
    }

    public function edit(Domain $domain)
    {
        $domain->load('bestPractices');

        $classifications = Classification::select('classification_id', 'classification_name')->get();
        $bestPractices = BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $bestPracticeIds =  $domain->bestPractices->pluck('best_practices_id')->toArray();



        return view('4-Process.1-InitialSetup.domains.create', compact('domain', 'classifications', 'bestPractices', 'bestPracticeIds'));
    }

    public function update(Domain $domain, Request $request)
    {
        $attributes = $request->validate([
            'main_domain_id' => ['required', 'unique:domain_table,main_domain_id,' . $domain->id],
            'main_domain_name' => 'required',
            'main_domain_description' => 'nullable',
            'classification_id' => 'nullable',
            'bestPractices' => 'required',
        ]);

        $bestPractices = $attributes['bestPractices'] ?? null;
        unset($attributes['bestPractices']);

        $domain->update($attributes);

        if (count($bestPractices)) {
            $domain->bestPractices()->sync($bestPractices);
        }

        return redirect(route('domains.index'))
            ->with('success', 'Domain saved successfully.');
    }

    public function destroy(Request $request)
    {

        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        Domain::where('id', $attributes['record'])->delete();

        return redirect(route('domains.index'))
            ->with('success', 'domain(s) deleted successfully.');


        // $ids =  $request->validate([
        //     'records' => ['required', 'array'],
        // ]);

        // try {
        //     Domain::whereIn('id', $ids['records'])->each(function ($domain) {
        //         if ($domain->subDomains()->exists()) {
        //             throw new \Exception("Domain {$domain->main_domain_name} cannot be deleted due to existing dependencies.");
        //         }
        //         $domain->bestPractices()->detach();
        //         $domain->delete();
        //     });

        //     return redirect(route('domains.index'))
        //         ->with('success', 'domain(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect(route('domains.index'))
        //         ->with('error', $e->getMessage());
        // }
    }
}
