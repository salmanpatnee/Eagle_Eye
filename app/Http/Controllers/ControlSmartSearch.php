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
    public function __invoke(Request $request)
    {

        $controlId = $request->input('control_name') ?? null;
        $classification = $request->input('classification') ?? null;
        $category = $request->input('category') ?? null;
        $type = $request->input('type') ?? null;
        $practice = $request->input('practice') ?? null;
        $domain = $request->input('domain') ?? null;
        $subdomain = $request->input('subdomain') ?? null;
        $relation = $request->input('relation') ?? null;


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



        $controls = DB::table('control_master_table as controlmaster')
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

        $controls
            ->when($controlId, function ($query) use ($request) {
                $query->where('controlmaster.control_id', $request->input('control_name'));
            })
            ->when($classification, function ($query) use ($request) {
                $query->where('classification.classification_id', $request->input('classification'));
            })
            ->when($category, function ($query) use ($request) {
                $query->where('category.category_id', $request->input('category'));
            })
            ->when($type, function ($query) use ($request) {
                $query->where('controltype.control_type_id', $request->input('type'));
            })
            ->when($practice, function ($query) use ($request) {
                $query->where('bestpractice.best_practices_id', $request->input('practice'));
            })
            ->when($domain, function ($query) use ($request) {
                $query->where('domain.main_domain_id', $request->input('domain'));
            })
            ->when($subdomain, function ($query) use ($request) {
                $query->where('subdomain.sub_domain_id', $request->input('subdomain'));
            })
            ->when($relation, function ($query) use ($request, $relation) {
                $query->where($relation, 'Yes');
            });

        $relations = [
            (object)[
                'relation_id' => 'control_critical_asset',
                'relation_name' => 'Control Critical Asset',
            ],
            (object)[
                'relation_id' => 'control_cloud',
                'relation_name' => 'Control Cloud',
            ],
            (object)[
                'relation_id' => 'control_telework',
                'relation_name' => 'Control Telework',
            ],
            (object)[
                'relation_id' => 'control_social_media',
                'relation_name' => 'Control Social Media',
            ],
            (object)[
                'relation_id' => 'control_data_privicy',
                'relation_name' => 'Control Data Privicy',
            ],
            (object)[
                'relation_id' => 'control_pii',
                'relation_name' => 'Control pii',
            ],
            (object)[
                'relation_id' => 'control_pci_dss',
                'relation_name' => 'Control Pci Dss',
            ],
            (object)[
                'relation_id' => 'control_e_commerce',
                'relation_name' => 'Control E-Commerce',
            ],
            (object)[
                'relation_id' => 'control_infrastructure',
                'relation_name' => 'Control Infrastructure',
            ],
            (object)[
                'relation_id' => 'control_application',
                'relation_name' => 'Control Application',
            ],
            (object)[
                'relation_id' => 'control_hr',
                'relation_name' => 'Control HR',
            ],
            (object)[
                'relation_id' => 'control_physical_security',
                'relation_name' => 'Control Physical Security',
            ],
            (object)[
                'relation_id' => 'control_operational',
                'relation_name' => 'Control Third Party',
            ],
            (object)[
                'relation_id' => 'control_payment',
                'relation_name' => 'Control Payment',
            ],
            (object)[
                'relation_id' => 'control_e_banking',
                'relation_name' => 'Control E-banking',
            ],
        ];
        // return $relations;


        $controls = $controls->paginate(20);

        $controls->appends([
            'control_id'    => $controlId,
            'classification' => $classification,
            'category'      => $category,
            'type'          => $type,
            'practice'      => $practice,
            'domain'        => $domain,
            'subdomain'     => $subdomain,
            'relation'      => $relation,
        ]);

        return view('process/control-identification/control-smart-search/index', [
            'controls'          => $controls,
            'controlIds'          => $controlIds,
            'controlNames'      => $controlNames,
            'classifications'   => $classifications,
            'categories'        => $categories,
            'types'             => $types,
            'practices'         => $practices,
            'domains'           => $domains,
            'subDomains'        => $subDomains,
            'controlId'         => $controlId,
            'classification'    => $classification,
            'category'          => $category,
            'type'              => $type,
            'practice'          => $practice,
            'domain'            => $domain,
            'subdomain'         => $subdomain,
            'relation'          => $relation,
            'relations'         => $relations,
        ]);
    }
}
