<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\Classification;
use App\Models\ControlMaster;
use App\Models\ControlType;
use App\Models\Domain;
use App\Models\SubDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlSmartSearch extends Controller
{
    public function index(Request $request)
    {

        $controlNames       = ControlMaster::select('control_id')->orderBy(DB::raw("CAST(SUBSTRING_INDEX(control_id, '-', 1) AS UNSIGNED)"))
        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_id, '-', 3), '-', -1) AS UNSIGNED)"))
        ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_id, '-', 4), '-', -1) AS UNSIGNED), 0)"))
        ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_id, '-', 5), '-', -1) AS UNSIGNED), 0)"))
        ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_id, '-', 6), '-', -1) AS UNSIGNED), 0)"))->get();

        $controlIds = ControlMaster::join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->orderControls()
            ->pluck('control_master_table.control_id');

        $classifications    = Classification::select('id', 'classification_id', 'classification_name')->get();
        $categories         = Category::select('id', 'category_id', 'category_name')->get();
        $types              = ControlType::select('id', 'control_type_id', 'control_type_name')->get();
        $practices          = BestPractice::select('id', 'best_practices_id', 'best_practices_name')->get();
        $domains            = Domain::select('id', 'main_domain_id', 'main_domain_name')->get();
        $subDomains         = SubDomain::select('id', 'sub_domain_id', 'sub_domain_name')->get();


        // $controls           = ControlMaster::select('control_id', 'control_name', 'classification_name', 'control_type_name')
        //     ->filter(request($this->getFilters()))
        //     ->paginate();

        $controls           = DB::table('control_master_table as controlmaster')
                            ->join('control_master_table_vs_category_table as controlcategory', 'controlcategory.control_id', '=', 'controlmaster.control_id')
                            ->join('category_table as category', 'category.category_id', '=', 'controlcategory.category_id')
                            ->join('control_master_table_vs_best_practice_table as controlbestpractice', 'controlbestpractice.control_id', '=', 'controlmaster.control_id')
                            ->join('best_practice_table as bestpractice', 'bestpractice.best_practices_id', '=', 'controlbestpractice.best_practice_id')
                            ->join('control_master_table_vs_domain_table as controldomain', 'controldomain.control_id', '=', 'controlmaster.control_id')
                            ->join('domain_table as domain', 'domain.main_domain_id', '=', 'controldomain.main_domain_id')
                            ->join('control_master_table_vs_sub_domain_table as controlsubdomain', 'controlsubdomain.control_id', '=', 'controlmaster.control_id')
                            ->join('sub_domain_table as subdomain', 'subdomain.sub_domain_id', '=', 'controlsubdomain.sub_domain_id')
                            ->join('control_type_table as controltype', 'controltype.control_type_id', '=', 'controlmaster.control_type_id')
                            ->join('classification_table as classification', 'classification.classification_id', '=', 'controlmaster.classification_id');

        if($request->has('control_name') && !is_null($request->input('control_name')))
            $controls->where('controlmaster.control_id', $request->input('control_name'));
        
        if($request->has('classification') && !is_null($request->input('classification')))
            $controls->where('classification.classification_id', $request->input('classification'));
        
        if($request->has('category') && !is_null($request->input('category')))
            $controls->where('category.category_id', $request->input('category'));

        if($request->has('type') && !is_null($request->input('type')))
            $controls->where('controltype.control_type_id', $request->input('type'));

        if($request->has('practice') && !is_null($request->input('practice')))
            $controls->where('bestpractice.best_practices_id', $request->input('practice'));
        
        if($request->has('domain') && !is_null($request->input('domain')))
            $controls->where('domain.main_domain_id', $request->input('domain'));

        if($request->has('subdomain') && !is_null($request->input('subdomain')))
            $controls->where('subdomain.sub_domain_id', $request->input('subdomain'));
        
        if($request->has('relation') && !is_null($request->input('relation')))
            $controls->where($request->input('relation'), 'Yes');

        // dd($controls->get());

        return view('4-Process.ControlSmartSearch.index', [
            'controls'          => $controls->get(),
            'controlIds'          => $controlIds,
            'controlNames'      => $controlNames,
            'classifications'   => $classifications,
            'categories'        => $categories,
            'types'             => $types,
            'practices'         => $practices,
            'domains'           => $domains,
            'subDomains'        => $subDomains,
        ]);
    }

    private function getFilters()
    {
        return [
            'control_name',
            'classification',
            'category',
            'type',
            'practice',
            'domain',
            'subdomain',
            'relation'
        ];
    }
}